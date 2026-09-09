import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
  static values = {
    event: String,
  };

  connect() {
    this.timers = new Set();
    this.toasts = new Set();
    this.handleToast = this.handleToast.bind(this);
    document.addEventListener(this.eventValue || 'toast.show', this.handleToast);
  }

  disconnect() {
    document.removeEventListener(this.eventValue || 'toast.show', this.handleToast);

    for (const timer of this.timers) {
      clearTimeout(timer);
    }

    for (const toast of this.toasts) {
      toast.remove();
    }

    this.timers.clear();
    this.toasts.clear();
  }

  handleToast(event) {
    const detail = event.detail;

    if (!detail || typeof detail.message !== 'string' || detail.message.trim() === '') {
      return;
    }

    const toast = document.createElement('div');
    const type = this.getType(detail.type);
    const duration = this.getDuration(detail.duration);
    const message = document.createElement('span');
    const dismiss = document.createElement('button');

    toast.className = `toast toast--${type}`;
    toast.setAttribute('role', 'status');
    message.className = 'toast-message';
    message.textContent = detail.message;
    dismiss.className = 'toast-dismiss';
    dismiss.type = 'button';
    dismiss.setAttribute('aria-label', 'Dismiss notification');
    dismiss.textContent = '\u00d7';

    toast.append(message, dismiss);
    this.element.append(toast);
    this.toasts.add(toast);

    const timer = setTimeout(() => this.removeToast(toast, timer), duration);
    this.timers.add(timer);
    dismiss.addEventListener('click', () => this.removeToast(toast, timer));
  }

  removeToast(toast, timer) {
    clearTimeout(timer);
    this.timers.delete(timer);
    this.toasts.delete(toast);
    toast.remove();
  }

  getType(type) {
    return ['success', 'error', 'warning', 'info'].includes(type) ? type : 'info';
  }

  getDuration(duration) {
    return Number.isFinite(duration) && duration > 0 ? duration : 5000;
  }
}
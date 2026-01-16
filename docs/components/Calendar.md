# Calendar

A monthly calendar grid component with customizable content for each day.

## Quick Start

```twig
<twig:K:Components:Calendar year="2024" month="1">
  <twig:block name="dayContent">
    Your content for {{ date }}
  </twig:block>
</twig:K:Components:Calendar>
```

## Properties

| Property | Type | Required | Default | Description |
|----------|------|----------|---------|-------------|
| `year` | int | Yes | - | The year to display |
| `month` | int | Yes | - | The month to display (1-12) |
| `minDayHeight` | int | No | `100` | Minimum height in pixels for each day cell |

## Blocks

### `dayContent`

Content rendered inside each day cell. Within this block, you have access to:

- `date` - The date string in `Y-m-d` format (e.g., `2024-01-15`)
- `dayOfMonth` - The day number (1-31)
- `dayOfWeek` - Day of week as number (1=Monday, 7=Sunday)
- `today` - Boolean, true if this day is today

### `day`

Override the entire day cell structure (advanced usage).

<details>
<summary>CSS Classes</summary>

The component uses these CSS classes:

- `.calendar` - Main container
- `.calendar-header` - Header row with day names
- `.calendar-body` - Grid of days
- `.day` - Individual day cell
- `.day.weekend` - Weekend days (Saturday, Sunday)
- `.day.today` - Current day
- `.dayNumber` - Day number display
- `.dayContent` - Content area within day

</details>

<details>
<summary>Full Example</summary>

Display time entries grouped by day:

```twig
<twig:K:Components:Calendar
  :year="selectedYear"
  :month="selectedMonth"
  minDayHeight="120"
>
  <twig:block name="dayContent">
    {% if entriesByDay[date] is defined %}
      <p class="total">
        Total: {{ entriesByDay[date]|reduce((sum, e) => sum + e.duration, 0)|format_duration }}
      </p>
      {% for entry in entriesByDay[date] %}
        <div class="entry">{{ entry.description }}</div>
      {% endfor %}
    {% endif %}
  </twig:block>
</twig:K:Components:Calendar>
```

</details>

# Calendar

The calendar component helps render a calendar view with custom blocks for each day.

## Example

```twig
  <twig:FrdComponents:Calendar year="{{ year }}" month="{{ month }}" minDayHeight="100">
    <twig:block name="dayContent">
      {% if entriesByDay[date] is defined %}
        <p>Total time: {{ entriesByDay[date]|map(entry => entry.durationInSeconds)|reduce((carry, duration) => carry + duration, 0) }}</p>
        {% for entry in entriesByDay[date] %}
          <twig:TimeEntry timeEntry="{{ entry }}" />
        {% endfor %}
      {% else %}
        <p>No entries</p>
      {% endif %}
    </twig:block>
  </twig:FrdComponents:Calendar>
```

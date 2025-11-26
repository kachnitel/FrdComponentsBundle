# Flying Rubber Duck's Component bundle

This bundle provides a set of components that can be used to build a web application. The components are designed to be used in a modular fashion, allowing you to pick and choose the components you need for your application.

# Documentation

See the [documentation](docs/index.md) for more details.

# TODO:

## Components
- Basic form fields (own bundle ideally)
- LiveAdmin (bundle eventually or right away?)
  - A set of list/view/edit components that can be used to build a basic admin interface.
  - Built entirely using LiveComponents
- DataTable
  - A component that displays a table of data.
  - Supports sorting, filtering, and pagination.
    - Filter per column, with
      - date range filter for date columns,
      - options for enum columns
      - fulltext for text(&number?) columns
      - design an interface for object filters, add library for doctrine filters (that requires doctrine and use its filters with simple config)
  - Can be used with a variety of data sources (e.g. arrays, objects, etc.).
- Agenda
  - A component that displays a list of items in a calendar view.
  - Items can be dragged and dropped to change the date/time.
  - Toggle between "list" and "agenda" view, where the list view shows a list of items for each day,
  while agenda shows items sized according to their duration and expand on hover (not mobile friendly).

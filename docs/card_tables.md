# Card Tables

## Show the card tables for a project

```php
// The card table is returned with a project dock with enough
// information for most use cases.
$cardTables = Basecamp::projects()->show($projectId)->cardTables();
```

```php
// If you need to call the endpoint for more details:
$cardTable = $cardTables->first()->show();

// Or
$cardTable = Basecamp::cardTables($projectId)->show($id);
```

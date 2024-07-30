# Card Table Columns

## Show the card table columns for a card table

```php
// The card table contains the required data to retrieve all the columns
$cardTableColumns = Basecamp::cardTables($this->projectID)->show($cardTableID)->columns();
```

# Cards

## List the cards for a given table

```php
// Get all the cards related to a column
Basecamp::cards($this->projectID, $cardTableColumnID)->index();

// Or if you've already retrieve your columns, get the cards directly from that
$cardTable->columns()->first()->cards()->index();
```

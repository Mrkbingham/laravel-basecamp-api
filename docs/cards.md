# Cards

## List the cards for a given table

```php
// Get all the cards related to a column
Basecamp::cards($this->projectID, $cardTableColumnID)->index();

// Or if you've already retrieve your columns, get the cards directly from that
$cardTable->columns()->first()->cards()->index();
```

## Update a card

```php
$card->update([
    'title' => 'The final task',
    'content' => '<div><em>Card details go here!</em></div>',
    'due_on' => '2025-12-31',
    'assignee_ids' => [$assignee1Id],
]);

// Or update with IDs.
Basecamp::cards($projectID)->update($cardID, [...]);
```

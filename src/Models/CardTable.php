<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;

class CardTable extends AbstractModel
{
    /**
     * Get the message board.
     *
     * @return \Illuminate\Http\Collection
     */
    public function show()
    {
        return Basecamp::cardTables($this->bucket->id)->show($this->id);
    }

    /**
     * List the columns.
     *
     * @return \Illuminate\Http\Collection
     */
    public function columns()
    {
        $kanbanCards = collect($this->lists)->filter(function ($column) {
            // Filter to only the Kanban Cards
            return strpos(strtolower($column->type), 'kanban::') === 0;
        });

        if ($kanbanCards->isEmpty()) {
            return collect([]);
        }
        $kanbanCards = $kanbanCards->map(function ($column) {
            $column->bucket = $this->bucket;
            return new CardTableColumn($column);
        });

        return $kanbanCards;
    }
}

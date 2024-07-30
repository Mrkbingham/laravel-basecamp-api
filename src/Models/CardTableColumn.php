<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;

class CardTableColumn extends AbstractModel
{
    /**
     * Get the message board.
     *
     * @return \Illuminate\Http\Collection
     */
    public function show()
    {
        return Basecamp::cardTableColumns($this->bucket->id)->show($this->id);
    }

    /**
     * List all the cards in a given column.
     *
     * @return \Illuminate\Http\Collection
     */
    public function cards()
    {
        return Basecamp::cards($this->bucket->id, $this->id);
    }
}

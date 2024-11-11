<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;
use Exception;
use Belvedere\Basecamp\Models\Traits\Commentable;

class Card extends AbstractModel
{
    use Commentable;

    public function create(int $cardTableColumnID, array $createData)
    {
        // Make sure the createData has the required 'title' key
        if (!array_key_exists('title', $createData)) {
            throw new Exception('Failed to create a new card - missing required field: title.');
        }

        return Basecamp::cards($this->bucket->id)->create($cardTableColumnID, $createData);
    }

    public function show($id)
    {
        return Basecamp::cards()->show($this->id);
    }

    /**
     * Update the card.
     *
     * @param  array  $data
     * @return \Illuminate\Http\Collection
     */
    public function update(array $data)
    {
        $card = Basecamp::cards($this->bucket->id)->update($this->id, $data);

        $this->setAttributes($card);

        return $card;
    }
}

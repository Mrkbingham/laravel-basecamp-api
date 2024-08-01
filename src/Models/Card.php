<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;
use Belvedere\Basecamp\Models\Traits\Commentable;

class Card extends AbstractModel
{
    use Commentable;

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

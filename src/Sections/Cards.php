<?php

namespace Belvedere\Basecamp\Sections;

use Belvedere\Basecamp\Models\Card;
use Belvedere\Basecamp\Models\Todo;

class Cards extends AbstractSection
{
    /**
     * Get a to-do.
     *
     * @param  int  $id
     */
    public function show(int $bucketId, int $id): Card
    {
        $card = $this->client->get(
            sprintf('buckets/%d/card_tables/cards/%d.json',$bucketId, $id)
        );

        return new Card($this->response($card));
    }

}

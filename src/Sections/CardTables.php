<?php

namespace Belvedere\Basecamp\Sections;

use Belvedere\Basecamp\Models\CardTable;

class CardTables extends AbstractSection
{
    /**
     * Get a card table.
     *
     * @param  integer  $id
     * @return \Illuminate\Support\Collection
     */
    public function show(int $id)
    {
        $cardTable = $this->client->get(
            sprintf('buckets/%d/card_tables/%d.json', $this->bucket, $id)
        );

        return new CardTable($this->response($cardTable));
    }
}

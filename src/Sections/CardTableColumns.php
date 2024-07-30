<?php

namespace Belvedere\Basecamp\Sections;

use Belvedere\Basecamp\Models\CardTableColumn;

class CardTableColumns extends AbstractSection
{
    /**
     * Get a card table's columns.
     *
     * @param  integer  $id
     * @return \Illuminate\Support\Collection
     */
    public function show(int $id)
    {
        $cardTableColumns = $this->client->get(
            sprintf('buckets/%d/card_tables/columns/%d.json', $this->bucket, $id)
        );

        return new CardTableColumn($this->response($cardTableColumns));
    }
}

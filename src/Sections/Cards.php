<?php

namespace Belvedere\Basecamp\Sections;

use Belvedere\Basecamp\Models\Card;

class Cards extends AbstractSection
{
    /**
     * Index all campfires.
     *
     * @param integer|null $page The page number.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index(int|null $page = null)
    {
        $url = sprintf('buckets/%d/card_tables/lists/%d/cards.json', $this->bucket, $this->parent);

        $cards = $this->client->get($url, [
            'query' => [
                'page' => $page,
            ],
        ]);

        return $this->indexResponse($cards, Card::class);
    }

    /**
     * Update a card.
     *
     * @param  int    $id
     * @param  array  $data
     * @return \Illuminate\Support\Collection
     */
    public function move($id, array $data)
    {
        return $this->client->post(
            sprintf('buckets/%d/card_tables/cards/%d/moves.json', $this->bucket, $id),
            [
                'json' => $data,
            ]
        );
    }

    /**
     * Get the cards.
     *
     * @param integer $bucketId The bucket ID.
     * @param integer $id       The card table ID.
     *
     * @return Card
     */
    public function show(int $bucketId, int $id): Card
    {
        $card = $this->client->get(
            sprintf('buckets/%d/card_tables/cards/%d.json', $bucketId, $id)
        );

        return new Card($this->response($card));
    }

    /**
     * Update a card.
     *
     * @param  int    $id
     * @param  array  $data
     * @return \Illuminate\Support\Collection
     */
    public function update($id, array $data)
    {
        $card = $this->client->put(
            sprintf('buckets/%d/card_tables/cards/%d.json', $this->bucket, $id),
            [
                'json' => $data,
            ]
        );

        return new Card($this->response($card));
    }
}

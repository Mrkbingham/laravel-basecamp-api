<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;
use Belvedere\Basecamp\Models\Traits\Commentable;

class Card extends Recording
{
    use Commentable;

    public function show($id)
    {
        return Basecamp::cards()->show($this->id);
    }
}

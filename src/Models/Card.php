<?php

namespace Belvedere\Basecamp\Models;

use Basecamp;
use Belvedere\Basecamp\Models\Traits\Commentable;

class Card extends AbstractModel
{
    public function show($id)
    {
        return Basecamp::cards()->show($this->id);
    }
}

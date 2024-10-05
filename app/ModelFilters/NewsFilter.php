<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class NewsFilter extends ModelFilter
{

    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    // поиск игры по совпадению названия
    public function search ($value): NewsFilter
    {
        return $this->where('title', 'LIKE', "%$value%")
            ->orWhere('content', 'LIKE', "%$value%");
    }


}

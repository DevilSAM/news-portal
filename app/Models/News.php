<?php

namespace App\Models;

use App\Models\Scopes\ActualScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @method static Builder|News filter(array $input = [], $filter = null)
 */
#[ScopedBy([ActualScope::class])]
class News extends Model
{
    use HasFactory, Filterable;

    protected $casts = [
        'published_at' => 'date:Y.m.d H:i:s',
        'created_at' => 'date:Y.m.d H:i:s',
        'updated_at' => 'date:Y.m.d H:i:s',
    ];
}

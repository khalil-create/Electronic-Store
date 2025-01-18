<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'image'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */

    /**
     * Return the comment's item
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}

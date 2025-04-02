<?php

namespace App\Models\Puzzle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $attribute_id
 * @property string $value
 * @property int $position
 *
 * @property-read Attribute $attribute
 */
class AttributeValue extends Model
{
    protected $fillable = [
        'attribute_id',
        'value',
        'position',
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}

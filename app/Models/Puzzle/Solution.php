<?php

namespace App\Models\Puzzle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $puzzle_id
 * @property int $subject_id
 * @property int $attribute_id
 * @property int $attribute_value_id
 *
 * @property-read Puzzle $puzzle
 * @property-read Subject $subject
 * @property-read Attribute $attribute
 * @property-read AttributeValue $attributeValue
 */
class Solution extends Model
{
    protected $fillable = [
        'puzzle_id',
        'subject_id',
        'attribute_id',
        'attribute_value_id',
    ];

    public function puzzle(): BelongsTo
    {
        return $this->belongsTo(Puzzle::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeValue(): BelongsTo
    {
        return $this->belongsTo(AttributeValue::class);
    }
}

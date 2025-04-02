<?php

namespace App\Models\Puzzle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property int $puzzle_id
 * @property string $name
 * @property int $position
 *
 * @property-read AttributeValue[] $values
 * @property-read Puzzle $puzzle
 */
class Attribute extends Model
{
    protected $fillable = [
        'puzzle_id',
        'name',
        'position',
    ];

    public function puzzle(): BelongsTo
    {
        return $this->belongsTo(Puzzle::class);
    }

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
}

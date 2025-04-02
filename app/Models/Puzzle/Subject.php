<?php

namespace App\Models\Puzzle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $puzzle_id
 * @property string $name
 * @property int $position
 *
 * @property-read Puzzle $puzzle
 */
class Subject extends Model
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
}

<?php

namespace App\Models\Puzzle;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $puzzle_id
 * @property string $text
 * @property int $position
 *
 * @property-read Puzzle $puzzle
 */
class Hint extends Model
{
    protected $fillable = [
        'puzzle_id',
        'text',
        'position',
    ];

    public function puzzle(): BelongsTo
    {
        return $this->belongsTo(Puzzle::class);
    }
}

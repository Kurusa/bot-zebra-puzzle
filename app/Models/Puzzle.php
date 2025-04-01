<?php

namespace App\Models;

use App\Enums\PuzzleDifficulty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property PuzzleDifficulty $difficulty
 */
class Puzzle extends Model
{
    protected $fillable = [
        'title',
        'description',
        'difficulty',
    ];

    protected $casts = [
        'difficulty' => PuzzleDifficulty::class,
    ];

    public function hints(): HasMany
    {
        return $this->hasMany(Hint::class);
    }
}

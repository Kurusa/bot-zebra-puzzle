<?php

namespace App\Models\Puzzle;

use App\Enums\PuzzleDifficulty;
use App\Models\Hint;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property PuzzleDifficulty $difficulty
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Subject[] $subjects
 * @property-read Attribute[] $attributes
 * @property-read Hint[] $hints
 * @property-read Solution[] $solutions
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

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class);
    }

    public function attributes(): HasMany
    {
        return $this->hasMany(Attribute::class);
    }

    public function hints(): HasMany
    {
        return $this->hasMany(Hint::class);
    }

    public function solutions(): HasMany
    {
        return $this->hasMany(Solution::class);
    }
}

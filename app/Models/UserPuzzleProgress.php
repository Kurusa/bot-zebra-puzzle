<?php

namespace App\Models;

use App\Models\Puzzle\Attribute;
use App\Models\Puzzle\AttributeValue;
use App\Models\Puzzle\Puzzle;
use App\Models\Puzzle\Subject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $puzzle_id
 * @property int $subject_id
 * @property int $attribute_id
 * @property int|null $attribute_value_id
 * @property Carbon|null $updated_at
 *
 * @property-read User $user
 * @property-read Puzzle $puzzle
 * @property-read Subject $subject
 * @property-read Attribute $attribute
 * @property-read AttributeValue|null $attributeValue
 */
class UserPuzzleProgress extends Model
{
    protected $fillable = [
        'user_id',
        'puzzle_id',
        'subject_id',
        'attribute_id',
        'attribute_value_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

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

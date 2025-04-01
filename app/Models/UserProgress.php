<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 * @property int $solved
 * @property int $failed
 * @property int $accuracy
 */
class UserProgress extends Model
{
    protected $fillable = [
        'user_id',
        'solved',
        'failed',
        'accuracy',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

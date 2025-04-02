<?php

namespace App\Models;

use App\Enums\UserStatus;
use App\Models\Puzzle\Puzzle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property bool $is_blocked
 * @property string|null $user_name
 * @property string|null $first_name
 * @property int $chat_id telegram chat ID of the user. Negative for group chats.
 * @property UserStatus $status
 * @property string $language
 * @property bool $show_feedback_immediately
 *
 * @property-read UserProgress $progress
 */
class User extends Model
{
    protected $fillable = [
        'is_blocked',
        'user_name',
        'first_name',
        'chat_id',
        'status',
        'language',
        'show_feedback_immediately',
    ];

    protected $casts = [
        'status' => UserStatus::class,
        'is_blocked' => 'boolean',
        'show_feedback_immediately' => 'boolean',
    ];

    public function matchStatus(UserStatus $status): bool
    {
        return $this->status === $status;
    }

    public function setStatus(UserStatus $status): void
    {
        $this->update([
            'status' => $status,
        ]);
    }

    public function feedbacks(): HasMany
    {
        return $this->hasMany(Feedback::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function progress(): HasOne
    {
        return $this->hasOne(UserProgress::class);
    }

    public function isAdmin(): bool
    {
        return $this->chat_id == config('telegram.admin_chat_id');
    }

    public function isGroupChat(): bool
    {
        return $this->chat_id < 0;
    }

    public function progressForPuzzle(Puzzle $puzzle)
    {
        return $this->progress()
            ->where('puzzle_id', $puzzle->id)
            ->get()
            ->keyBy(fn($p) => $p->subject_id . '_' . $p->attribute_id);
    }
}

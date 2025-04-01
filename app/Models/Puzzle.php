<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    protected $fillable = [
        'title', 'description', 'difficulty'
    ];

    const EASY = 'easy';
    const MEDIUM = 'medium';
    const HARD = 'hard';

    public static function getAvailableDifficulties()
    {
        return [
            self::EASY,
            self::MEDIUM,
            self::HARD,
        ];
    }
}

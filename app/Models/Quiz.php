<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'traditional_game_id',
        'title',
    ];

    /** Relasi: Quiz → Game */
    public function traditionalGame()
    {
        return $this->belongsTo(TraditionalGame::class);
    }

    /** Relasi: Quiz → Questions */
    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }

    /** Relasi: Quiz → Results */
    public function results()
    {
        return $this->hasMany(QuizResult::class);
    }
}

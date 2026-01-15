<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
    ];

    /** Relasi: Result → User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Relasi: Result → Quiz */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}

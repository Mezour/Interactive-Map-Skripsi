<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraditionalGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'name',
        'description',
        'how_to_play',
        'cultural_value',
        'image',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}

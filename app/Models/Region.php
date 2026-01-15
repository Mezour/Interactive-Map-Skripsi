<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'province',
        'bps_code',
        // 'latitude',
        // 'longitude',
    ];
    public function traditionalGames()
    {
        return $this->hasMany(TraditionalGame::class);
    }
}

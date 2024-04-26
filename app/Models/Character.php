<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'enemy',
        'defense',
        'strength',
        'accuracy',
        'magic',
    ];

    public function getAbilityPointsSumAttribute()
    {
        return $this->defence + $this->strength + $this->accuracy + $this->magic;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contests()
    {
        return $this->hasMany(Contest::class);
    }
}

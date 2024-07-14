<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaceData extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament',
        'swim_stroke',
        'course',
        'competition',
        'position',
        'updated_by',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

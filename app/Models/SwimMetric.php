<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwimMetric extends Model
{
    protected $fillable = [
        'time',
        'heart_rate',
        'distance',
        'pace',
        'stroke_count',
        'stroke_rate',
        'calories',
        'distance_per_stroke',
        'updated_by',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

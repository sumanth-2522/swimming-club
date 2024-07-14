<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'relation',
        'email',
        'password',
    ];

    public function users(){
        $this->hasMany(User::class);
    }
    use HasFactory;
}

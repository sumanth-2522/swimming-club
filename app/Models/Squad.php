<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Squad extends Model
{
    protected $fillable = [
        'name',
        'member_count',
        'current_member_count',
        'employee_id',
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
    use HasFactory;
}

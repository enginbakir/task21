<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    const DOING = 1;
    const TODO = 2;
    const DONE = 3;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function assignedUser()
    {
        return $this->hasMany(User::class);
    }
}

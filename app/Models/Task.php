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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    public function sortByStatus()
    {
        $tasks = Task::all();
        $taskSorted = $tasks->sortBy([
            ['status', 'asc'],
            ['title', 'asc'],
        ]);

        return $taskSorted;
    }
}

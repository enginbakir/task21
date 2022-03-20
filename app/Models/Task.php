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

    public $assignedUser;
    public $testVal = "test val";
    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function __construct(array $attributes = [])
    {
        $this->assignedUser = User::factory()->create();
        parent::__construct($attributes);
    }

    public function testVal(){
        return $this->testVal;
    }

    public function assignedUser()
    {
        echo "assignedUser method";
        //return $this->belongsTo(User::class);
    }

    public function sortByStatus()
    {
        $tasks = Task::all();
    }
}

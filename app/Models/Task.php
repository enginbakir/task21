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

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function __construct(array $attributes = [])
    {
        echo "<br>attributes<br><br>";
        print_r($attributes);

        echo "<br>User<br><br>";
        print_r(User::find($attributes['user_id']));

        exit;
//        $this->assignedUser = User::factory()->create();
        $this->assignedUser = User::find($attributes['user_id']);
        parent::__construct($attributes);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class);
    }

    public function sortByStatus()
    {
        $tasks = Task::all();
    }
}

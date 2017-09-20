<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function users()
    {
    	return $this->belongsToMany(User::class, 'pivot', 'task_id', 'user_id');
    }
}

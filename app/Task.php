<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = ['user_id'];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'pivot', 'task_id', 'user_id');
    }
}

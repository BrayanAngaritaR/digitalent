<?php

namespace App\Models;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Model;

class UserIdea extends Model
{
    protected $fillable = [
    	'user_id',
		'idea_id',
		'progress'
    ];

    public function idea()
    {
    	$this->belongsToMany(Idea::class, 'idea_id');
    }
}	

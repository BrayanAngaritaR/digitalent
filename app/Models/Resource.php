<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    protected $fillable = [
    	'title',
    	'url',
    	'idea_id',
		'step_id'
    ];
}

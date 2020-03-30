<?php

namespace App\Models;

use App\Models\UserIdeas;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
    	'title',
        'slug',
        'extract',
        'url',
        'category_id',
        'english_idea'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_ideas')->withPivot('progress');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
    	'title',
        'slug',
        'extract',
        'url',
        'category_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}

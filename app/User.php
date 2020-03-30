<?php

namespace App;

use App\Models\Idea;
use App\Models\UserIdea;
use App\Models\UserTask;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tasks(){
        return $this->hasMany(UserTask::class);
    }

    // public function ideas(){
    //     return $this->hasMany(Idea::class, 'user_ideas', 'idea_ids');
    // }

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'user_ideas')->withPivot('progress');
    }

    public function progress($idea){
        $user = Auth::id();
        $progress = UserIdea::where('user_id', $user)
                    ->where('idea_id', $idea->id)
                    ->first();

        return $progress;
    }
}

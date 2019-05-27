<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
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

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'name' => $user->splitName(),
                'lastname' => $user->splitLastname(),
                'club_id' => rand(0,12),
            ]);
        });
    }

    public function splitName()
    {
        $userWholeName = $this->name;
        $pieces = explode(" ", $userWholeName);
        return $pieces[0];
    }

    public function splitLastname()
    {
        $userWholeName = $this->name;

        if (strpos($userWholeName, " ") !== false) {
            $pieces = explode(" ", $userWholeName);
            return $pieces[1];
        } else {
            return "";
        }

        // $pieces = explode(" ", $userWholeName);
        // return $pieces[1];
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }

    public function favoriting()
    {
        return $this->belongsToMany(Post::class);
    }

    public static function thisUser()
    {
        return Auth::user() ? Auth::user() : null;
    }

}

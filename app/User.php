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
            $i = $user->id;

            

            // if ($i % 12 !== 0)
            // {
                $user->profile()->create([
                    'name' => $user->splitName(),
                    'lastname' => $user->splitLastname(),
                    'club_id' => $i % 12 == 0 ? 12 : $i % 12,
                    'position' => ($i < 25) ? 1 : (($i < 49) ? 2: (($i < 73) ? 3 : (($i < 97 ) ? 4 : (($i < 121 ) ? 5 : (( $i < 145) ? 6 : (($i < 169) ? 7 : (($i < 194) ? 8 : 9))))))),
                    'number' => rand(1,99),
                ]);
            // } else {
            //     $user->profile()->create([
            //         'name' => $user->splitName(),
            //         'lastname' => $user->splitLastname(),
            //         'club_id' => 12,
            //     ]);
            // }
        });
    }


    public function splitName()
    {
        $userWholeName = $this->name;
        $pieces = explode(" ", $userWholeName);
        if (count($pieces) < 3 && strpos($pieces[0], '.') !== true)
        {
            return $pieces[0];
        } else {
            return $pieces[1];
        }
    }

    public function splitLastname()
    {
        $userWholeName = $this->name;

        if (strpos($userWholeName, " ") !== false) {
            $pieces = explode(" ", $userWholeName);
                if (count($pieces) < 3 && strpos($pieces[0], '.') !== true)
                {
                    return $pieces[1];
                } else {
                    return $pieces[2];
                }
        } else {
            return "";
        }

        // $pieces = explode(" ", $userWholeName);
        // return $pieces[1];
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'Admin')->exists();
    }
    public function isTrainer() {
        return $this->roles()->where('name', 'Trainer')->exists();
    }
    
    public function isUser() {
        return $this->roles()->where('name', 'User')->exists();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
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

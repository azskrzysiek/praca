<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'club_id_home', 'id_home_player', 'club_id_away','id_away_player','scoreFull','scoreHalf','description','video',
    ];


    // protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorited()
    {
        return $this->belongsToMany(User::class);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }


    public function explodeScore($string)
    {
        return explode(':', $string);
    }

    public function score($value, $i)
    {
        $result_array = array();

        $strings_array = $this->explodeScore($value);

        foreach ($strings_array as $each_number) {
            $result_array[] = (int) $each_number;
        }

        return $result_array[$i];
    }

    public function scoreHomeFull()
    {
       return  $score = $this->score($this->scoreFull, 0);
    }
    
    public function scoreAwayFull()
    {
       return  $score = $this->score($this->scoreFull, 1);
    }
    
    public function scoreHomeHalf()
    {
       return  $score = $this->score($this->scoreHalf, 0);
    }
    
    public function scoreAwayHalf()
    {
       return  $score = $this->score($this->scoreHalf, 1);
    }
    
}

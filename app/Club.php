<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{

    protected $fillable = [
        'name','logo'
    ];

    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}

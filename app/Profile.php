<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name', 'lastname','description', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPositioneAttribute()
    {
        $position = ['Bramkarz','Lewoskrzydłowy','Leworozgrywający','Środkowy','Praworozgrywający','Prawoskrzydłowy','Kołowy','Kołowy','Trener','Kibic'];

        $where = $this->position;

        return $position[$where - 1];

    }
}

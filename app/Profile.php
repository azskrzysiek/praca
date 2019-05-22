<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name', 'lastname', 'description','position', 'image',
    ];

    public function profileImage()
    {
        return ($this->image) ? '/storage/' . $this->image : '/jpg/noimage.jpg';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPositioneAttribute()
    {
        $position = ['Bramkarz', 'Lewoskrzydłowy', 'Leworozgrywający', 'Środkowy', 'Praworozgrywający', 'Prawoskrzydłowy', 'Kołowy', 'Kołowy', 'Trener', 'Kibic'];

        $where = $this->position;

        return $position[$where - 1];

    }
    
}

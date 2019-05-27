<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name', 'lastname', 'position','age','height','experience','club_id', 'image','urlFacebook','urlTwitter','urlInstagram',
    ];

    public function profileImage()
    {
        return ($this->image) ? '/storage/' . $this->image : '/jpg/noimage.jpg';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function getPositioneAttribute()
    {
        $position = ['Bramkarz', 'Lewoskrzydłowy', 'Leworozgrywający', 'Środkowy', 'Praworozgrywający', 'Prawoskrzydłowy', 'Kołowy', 'Kołowy', 'Trener', 'Kibic'];

        $where = $this->position;

        return $position[$where - 1];

    }

    public function getClubeAttribute()
    {
        $club = ['Brak','Kupa', 'Nielba Wągrowiec', 'Jurand Ciechanów', 'SMS Gdańsk', 'Gwardia Koszalin', 'Sambor Tczew', 'Sokół Kościerzyna', 'Warmia Olsztyn', 'GKS Żukowo', 'Mazur Sierpc','Wójcik Elbląg','Pomozenia Malbork'];

        $where = $this->club_id;

        return $club[$where];

    }

    public function getDescriptioneAttribute()
    {

        $items = nl2br($this->description);
        $array = explode('<br />', $items);

        if (empty($array))
        {
            return null;
        } else {
            return $array;
        }


    }
    
}

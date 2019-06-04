<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
        'name', 'lastname', 'position','age','height','experience','club_id', 'image','urlFacebook','urlTwitter','urlInstagram','description','transfer','number',
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
        $position = ['Bramkarz', 'Lewoskrzydłowy', 'Leworozgrywający', 'Środkowy', 'Praworozgrywający', 'Prawoskrzydłowy', 'Kołowy', 'Trener', 'Kibic'];

        $where = $this->position;

        return $position[$where - 1];

    }

    public function getClubeAttribute()
    {

        $club = ['Brak','Stal Gorzów', 'Nielba Wągrowiec', 'Jurand Ciechanów', 'Sambor Tczew', 'Wójcik Elbląg', 'Mazur Sierpc', 'GKS Żukowo', 'Gwardia Koszalin', 'SMS Gdańsk', 'Warmia Olsztyn','Sokół Kościerzyna','MKS Malbork'];


        $where = $this->transfer;

        if ($where === null)
        {
            return 'Brak';
        } else {
            return $club[$where];
        }


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

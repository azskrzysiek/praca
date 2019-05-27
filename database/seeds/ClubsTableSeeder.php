<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clubs')->insert([
            [
                'name' => 'Stal Gorzów',
                'logo' => 'stalgorzow.jpg'
            ],
            [
                'name' => 'Neilba Wągrowiec',
                'logo' => 'nielbawagrowiec.jpg'
            ],
            [
                'name' => 'Jurand Ciechanów',
                'logo' => 'jurandciechanow.jpg'
            ],
            [
                'name' => 'Sambor Tczew',
                'logo' => 'sambortczew.jpg'
            ],
            [
                'name' => 'Wójcik Elbląg',
                'logo' => 'wojcikelblag.png'
            ],
            [
                'name' => 'Mazur Sierpc',
                'logo' => 'mazursierpc.jpg'
            ],
            [
                'name' => 'Gks Żukowo',
                'logo' => 'gkszukowo.png'
            ],
            [
                'name' => 'Gwardia Koszalin',
                'logo' => 'gwardiakoszalin.png'
            ],
            [
                'name' => 'SMS Gdańsk',
                'logo' => 'smsgdansk.jpg'
            ],
            [
                'name' => 'Warmia Olsztyn',
                'logo' => 'warmiaolsztyn.jpg'
            ],
            [
                'name' => 'Sokół Kościerzyna',
                'logo' => 'sokolkoscierzyna.jpg'
            ],
            [
                'name' => 'Mks Malbork',
                'logo' => 'pomezaniamalbork.jpg'
            ],
        ]);
    }
}

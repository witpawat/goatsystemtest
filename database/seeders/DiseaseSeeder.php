<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disease = [
            ['disease_name' => 'โรคแบล็กเลก (Blackleg)'],
            ['disease_name' => 'โรคเฮโมรายิกเซฟติซีเมีย (Haemorrhagic septicemia)'],
            ['disease_name' => 'โรคแอนแทรกซ์ (Antrax)'],
            ['disease_name' => 'โรคปากเปื่อย (Sore Mouth)'],
            ['disease_name' => 'โรคบรูเซลโลซิส (Brucellosis)'],
        ];

        foreach($disease as $key => $value) {
            Disease::create($value);
        }
    }
}

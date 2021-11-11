<?php

namespace Database\Seeders;

use App\Models\Vaccine;
use Illuminate\Database\Seeder;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disease = [
            ['vaccine_name' => 'วัคซีนแบล็กเลก (Blackleg Vaccine)'],
            ['vaccine_name' => 'วัคซีนเฮโมรายิกเซฟติซีเมีย (Haemorrhagic septicemia Vaccine)'],
            ['vaccine_name' => 'วัคซีนแอนแทรกซ์ (Antrax Vaccine)'],
            ['vaccine_name' => 'วัคซีนปากเปื่อย (Sore Mouth Vaccine)'],
            ['vaccine_name' => 'วัคซีนบรูเซลโลซิส (Brucellosis Vaccine)'],
        ];

        foreach($disease as $key => $value) {
            Vaccine::create($value);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Gene;
use Illuminate\Database\Seeder;

class GeneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gene = [
            ['gene_name' => 'พันธุ์แองโกลนูเบียน (Anglonubian)'],
            ['gene_name' => 'พันธุ์บอร์ (Boer)'],
            ['gene_name' => 'พันธุ์ซาเนน (Saanen)'],
            ['gene_name' => 'พันธุ์หลาวซาน (Laoshan)'],
            ['gene_name' => 'พันธุ์อัลไพน์ (Alpine)'],
            ['gene_name' => 'พันธุ์ทอกเก็นเบอร์ก (Toggenburg)'],
        ];

        foreach($gene as $key => $value) {
            Gene::create($value);
        }
    }
}

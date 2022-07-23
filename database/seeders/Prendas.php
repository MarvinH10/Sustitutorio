<?php

namespace Database\Seeders;

use App\Models\Prenda;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Prendas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prenda::factory(10)->create();
    }
}

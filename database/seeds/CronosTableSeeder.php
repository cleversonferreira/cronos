<?php

use Illuminate\Database\Seeder;

class CronosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Cronos::class,5)->create();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\redaco_test;

class testRedacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 5 ; $i++) { 
           redaco_test::create([
            'image' => 'image'.$i.'.png',
            'love_count' => rand(1,100)
           ]);
        }
        
    }
}

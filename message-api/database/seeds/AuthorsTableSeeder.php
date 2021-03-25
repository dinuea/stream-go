<?php

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'name' =>"Agnes"
        ]);
        Author::create([
            'name' =>"Meriall"
        ]);
        Author::create([
            'name' =>"Alexander"
        ]);
    }
}

<?php

use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    protected $genre_list = [
        'Action',
        'Adventure',
        'Comedy',
        'Crime',
        'Drama',
        'Fantasy',
        'Historical',
        'Horror',
        'Magical realism',
        'Mystery',
        'Philosophical',
        'Political',
        'Romance',
        'Saga',
        'Science fiction',
        'Social',
    ];


    public function run()
    {
        foreach ($this->genre_list as $genre) {
            Genre::create([
                'name' => $genre,
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit.',
                'status' => rand(0, 1)
            ]);
        }
    }
}

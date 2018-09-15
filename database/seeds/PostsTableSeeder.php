<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Post::class, 1000)->create();

        factory(App\Post::class, 1000)->create()->each(function ($p) {
            $p->images()->save(factory(App\Image::class)->make());
        });
    }
}

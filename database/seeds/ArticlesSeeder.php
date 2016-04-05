<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert(
          [
              'title' => 'PHP',
              'body' => 'PHP Description',
              'published_at' => \Carbon\Carbon::now()
          ]
        );

        DB::table('articles')->insert(
            [
                'title' => 'PHP Strom',
                'body' => 'PHP  Strom Description',
                'published_at' => \Carbon\Carbon::now()
            ]
        );
        DB::table('articles')->insert(
            [
                'title' => 'Java',
                'body' => 'Java Desc',
                'published_at' => \Carbon\Carbon::now()
            ]
        );
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1
        ]);
        User::factory(14)->create();
        Category::factory(8)->create();
        Post::factory(30)->create();
        Tag::factory(15)->create();

        for ($i = 0; $i < 100; $i++) {
            try {
                DB::table('post_tag')->insert([
                    'post_id' => rand(1, 30),
                    'tag_id' => rand(1, 15)
                ]);
            } catch (QueryException $e) {
                continue;
            }
        }
        $insertArray = [];
        for ($i=2; $i<16; $i++){
        $insertArray[]=[
            'author_id' => 1,
            'reader_id'=> $i
        ];
    }
        DB::table('author_reader')->insert($insertArray);
    }
}

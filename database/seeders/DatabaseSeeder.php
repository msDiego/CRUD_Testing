<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Community;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void{

        User::factory(2)
            ->has(Community::factory(2)->has(Post::factory(1)))
            ->create();

        User::factory()->create([
            'nombre'=>'Diego',
            'email'=>'diego@abc.com',
            'password'=>'hola'
        ]);

    }
}

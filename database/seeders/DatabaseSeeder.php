<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Community;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $comunidad = Community::factory()->count(4)->create();
        $usuario = User::factory()->count(3)->hasAttached($comunidad[mt_rand(0,3)])->hasAttached($comunidad[mt_rand(0,3)])->create();
        $usuario->merge(User::factory()->count(3)->hasAttached($comunidad[mt_rand(0,3)])->hasAttached($comunidad[mt_rand(0,3)])->create());
        foreach ($comunidad as $com){
            foreach ($usuario as  $us){
                Post::factory()
                    ->for($com)
                    ->for($us)
                    ->has(Comment::factory()->for($us)->count(3))
                    ->count(4)
                    ->create();
            }
    }

} 
}

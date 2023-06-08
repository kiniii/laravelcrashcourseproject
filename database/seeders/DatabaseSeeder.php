<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Project;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     @return void
     */

    public function run()
    {
        $user = User::factory()->create([
            'name' => 'John Doe'
        ]);
        Project::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}

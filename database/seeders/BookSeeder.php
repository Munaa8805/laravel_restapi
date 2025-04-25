<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = \App\Models\User::all();
        for ($index = 0; $index < 200; $index++) {
            $user = $users->random();
            \App\Models\Book::factory()->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
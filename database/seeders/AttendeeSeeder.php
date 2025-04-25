<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = \App\Models\User::all();
        $books = \App\Models\Book::all();
        foreach ($users as $user) {
            $booksToAttend = $books->random(rand(1, 10));
            foreach ($booksToAttend as $book) {
                \App\Models\Attendee::create([
                    'user_id' => $user->id,
                    'book_id' => $book->id,
                ]);
            }
        }
    }
}
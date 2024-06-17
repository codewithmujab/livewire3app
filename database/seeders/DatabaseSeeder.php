<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $actor = Actor::create(['name' => 'Leonardo DiCaprio']);
        $actor->films()->create(['name' => 'Titanic (1997)']);
        $actor->films()->create(['name' => 'The Departed (2006)']);
        $actor->films()->create(['name' => 'The Revenant (2015)']);
        $actor->films()->create(['name' => 'Once Upon a Time in Hollywood (2019)']);

        $actor = Actor::create(['name' => 'Tom Hanks']);
        $actor->films()->create(['name' => 'Forrest Gump (1994)']);
        $actor->films()->create(['name' => 'Saving Private Ryan (1998)']);
        $actor->films()->create(['name' => 'Cast Away (2000)']);
        $actor->films()->create(['name' => 'The Da Vinci Code (2006)']);

        $actor = Actor::create(['name' => 'Brad Pitt']);
        $actor->films()->create(['name' => 'Fight Club (1999)']);
        $actor->films()->create(['name' => 'Troy (2004)']);
        $actor->films()->create(['name' => 'Mr. & Mrs. Smith (2005)']);
        $actor->films()->create(['name' => 'Once Upon a Time in Hollywood (2019)']);

        $actor = Actor::create(['name' => 'Robert De Niro']);
        $actor->films()->create(['name' => 'The Godfather Part II (1974)']);
        $actor->films()->create(['name' => 'Taxi Driver (1976)']);
        $actor->films()->create(['name' => 'Goodfellas (1990)']);
        $actor->films()->create(['name' => 'The Irishman (2019)']);

        $actor = Actor::create(['name' => 'Meryl Streep']);
        $actor->films()->create(['name' => 'Kramer vs Kramer (1979)']);
        $actor->films()->create(['name' => 'Sophie\'s Choice (1982)']);
        $actor->films()->create(['name' => 'The Devil Wears Prada (2006)']);
        $actor->films()->create(['name' => 'The Iron Lady (2011)']);

        $actor = Actor::create(['name' => 'Julia Roberts']);
        $actor->films()->create(['name' => 'Pretty Woman (1990)']);
        $actor->films()->create(['name' => 'Erin Brockovich (2000)']);
        $actor->films()->create(['name' => 'Notting Hill (1999)']);
        $actor->films()->create(['name' => 'Wonder (2017)']);
    }
}

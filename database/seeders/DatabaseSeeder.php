<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $trainers = Trainer::factory(5)->create();
        Event::factory(20)->create([
            'trainer_id' => fn() => $trainers->random()->getKey(),
        ]);
    }
}

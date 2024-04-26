<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use App\Models\Place;
use App\Models\Character;
use App\Models\Contest;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'admin' => true,
        ]);

        $faker = FakerFactory::create('hu_HU');

        // Helyek generálása
        for ($i = 0; $i < 5; $i++) {
            Place::create([
                'name' => $faker->city,
                'image' => $faker->imageUrl,
            ]);
        }

        // Karakterek generálása
        for ($i = 0; $i < 20; $i++) {
            $user = User::find(rand(1, 10)); // Véletlenszerű felhasználó kiválasztása
            $enemy = $i % 2 === 0 && $user->admin; // Csak adminnak lehet ellensége
            $abilityPointsSum = rand(1, 20); // Képességpontok összege

            Character::create([
                'name' => $faker->name,
                'enemy' => $enemy,
                'defense' => rand(0, $abilityPointsSum - $enemy * 3),
                'strength' => rand(0, $abilityPointsSum - $user->defence),
                'accuracy' => rand(0, $abilityPointsSum - $user->strength),
                'magic' => rand(0, $abilityPointsSum - $user->accuracy),
            ]);
        }

        // Mérkőzések generálása
        for ($i = 0; $i < 30; $i++) {
            $winner = rand(0, 1); // Véletlenszerű győztes kiválasztása

            $history = $faker->paragraph; // Példa történelem generálására

            Contest::create([
                'win' => $winner,
                'history' => $history,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('proteins')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/pork/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/pork/active.svg',
            'name' => 'Chasu',
            'description' => 'A sliced flavourful pork meat with a selection of season vegetables.',
            'price' => 10,
        ]);

        DB::table('proteins')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/yasai/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/yasai/active.svg',
            'name' => 'Yasai Vegetarian',
            'description' => 'A delicious vegetarian lamen with a selection of season vegetables.',
            'price' => 10,
        ]);

        DB::table('proteins')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/chicken/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/chicken/active.svg',
            'name' => 'Karaague',
            'description' => 'Three units of fried chicken, moyashi, ajitama egg and other vegetables.',
            'price' => 12,
        ]);

        DB::table('broths')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/miso/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/miso/active.svg',
            'name' => 'Miso',
            'description' => 'Paste made of fermented soybeans',
            'price' => 12,
        ]);

        DB::table('broths')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/shoyu/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/shoyu/active.svg',
            'name' => 'Shoyu',
            'description' => 'The good old and traditional soy sauce',
            'price' => 10,
        ]);

        DB::table('broths')->insert([
            'imageInactive' => 'https://tech.redventures.com.br/icons/salt/inactive.svg',
            'imageActive' => 'https://tech.redventures.com.br/icons/salt/active.svg',
            'name' => 'Salt',
            'description' => 'Simple like the seawater, nothing more',
            'price' => 10,
        ]);
    }
}

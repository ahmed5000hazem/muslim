<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Muslim',
            'email' => 'admin@admin.com',
            'role' => 'site-owner',
            'image' => '/storage/site/profile.jpg',
            'password' => bcrypt('123456'),
            'about' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque ipsam odio laborum aliquid id. Dolores numquam, illum rem dolorem dolor maxime est officiis sit tenetur! Quod voluptatibus veniam necessitatibus cupiditate."
        ]);
    }
}

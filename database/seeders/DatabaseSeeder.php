<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\BookCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => Env::get('ADMIN_NAME'),
            'email' => Env::get('ADMIN_EMAIL'),
            'password' => bcrypt(Env::get('ADMIN_PASSWORD')),
            'email_verified_at' => time(),
        ]);

        BookCategory::factory()
            ->count(5)
            ->create();

        Book::factory()
            ->count(30)
            ->create();
    }
}

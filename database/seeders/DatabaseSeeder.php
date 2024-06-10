<?php

namespace Database\Seeders;

use App\Models\Nota;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(10)->create();
        Nota::factory(30)->create();
        Tag::factory(10)->create();
    }
}

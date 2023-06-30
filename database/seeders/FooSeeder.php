<?php

namespace Database\Seeders;

use App\Models\Foo;
use Database\Factories\FooFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Foo::factory()->count(20)->create();
    }
}

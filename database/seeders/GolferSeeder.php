<?php

namespace Database\Seeders;

use App\Models\Golfer;
use Illuminate\Database\Seeder;

class GolferSeeder extends Seeder
{
    public function run(): void
    {
        $counter = 1;

        Golfer::factory()
            ->count(100)
            ->sequence(fn () => [
                'debitor_account' => $counter++,
            ])
            ->create();
    }
}

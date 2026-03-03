<?php

namespace Database\Seeders;

use App\Models\Golfer;
use Illuminate\Database\Seeder;

class GolferSeeder extends Seeder
{
    public function run(): void
    {
        $start = Golfer::max('debitor_account') ?? 0;
        $counter = $start + 1;

        Golfer::factory()
            ->count(100)
            ->sequence(function () use (&$counter) {
                return [
                    'debitor_account' => $counter++,
                ];
            })
            ->create();
    }
}
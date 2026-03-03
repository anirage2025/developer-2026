<?php

namespace App\Http\Controllers;

use App\Models\Golfer;
use Illuminate\Http\Request;

class GolferExportController extends Controller
{
    /**
     * Returns the 500 nearest golfers as CSV download.
     */
    public function nearCsv(Request $request)
    {
        $lat = (float) $request->query('lat');
        $lng = (float) $request->query('lng');

        $golfers = Golfer::all();

        foreach ($golfers as $golfer) {
            $golfer->distance = $this->calculateDistance(
                $lat,
                $lng,
                $golfer->latitude,
                $golfer->longitude
            );
        }

        $nearest = $golfers
            ->sortBy('distance')
            ->take(500)
            ->values();

        return response()->stream(function () use ($nearest) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['id', 'name', 'email', 'latitude', 'longitude', 'distance']);

            foreach ($nearest as $golfer) {
                fputcsv($file, [
                    $golfer->id,
                    $golfer->name,
                    $golfer->email,
                    $golfer->latitude,
                    $golfer->longitude,
                    round($golfer->distance, 2),
                ]);
            }

            fclose($file);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="nearest_golfers.csv"',
        ]);
    }

    private function calculateDistance($lat1, $lon1, $lat2, $lon2)
    {
        $earthRadius = 6371;

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2)
            + cos(deg2rad($lat1))
            * cos(deg2rad($lat2))
            * sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earthRadius * $c;
    }
}
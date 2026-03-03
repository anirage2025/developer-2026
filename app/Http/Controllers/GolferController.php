<?php

namespace App\Http\Controllers;

use App\Models\Golfer;
use Illuminate\Http\Request;

class GolferController extends Controller
{
    /**
     * Returns the 500 nearest golfers
     * based on given latitude and longitude.
     */
    public function near(Request $request)
    {
        $lat = (float) $request->query('lat');
        $lng = (float) $request->query('lng');

        $golfers = Golfer::all();

        // Calculate distance for each golfer
        foreach ($golfers as $golfer) {
            $golfer->distance = $this->calculateDistance(
                $lat,
                $lng,
                $golfer->latitude,
                $golfer->longitude
            );
        }

        // Sort by distance and take first 500
        $nearest = $golfers
            ->sortBy('distance')
            ->take(500)
            ->values();

        return response()->json($nearest);
    }

    /**
     * Simple Haversine distance calculation in kilometers.
     */
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
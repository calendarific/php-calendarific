<?php

namespace Calendarific;

use Calendarific\Api\Client\Client;
use Calendarific\Api\Request\Request;

class Calendarific
{
    /**
     * Helper to create the client, set all the required parameters,
     * and perform the query to fetch the correct data.
     *
     * @param  string $key
     * @param  string $country
     * @param  int $year
     * @param  int|null $month
     * @param  int|null $day
     * @param  string|null $location
     * @param  array $types
     *
     * @return array
     */
    public static function make(
        string $key,
        string $country,
        int $year,
        int $month = null,
        int $day = null,
        string $location = null,
        array $types = []
    ) : array {

        $request = new Request(
            $key,
            $country,
            $year
        );

        if ($month) {
            $request->setMonth($month);
        }

        if ($day) {
            $request->setDay($day);
        }

        if ($location) {
            $request->setLocation($location);
        }

        if ($types) {
            $request->setTypes($types);
        }

        return (new Client($request))->getDates();

    }
}

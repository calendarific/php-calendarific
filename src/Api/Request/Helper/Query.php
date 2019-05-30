<?php

namespace Calendarific\Api\Request\Helper;

use Calendarific\Api\Request\Request;

class Query
{

    /**
     * @var string
     */
    const ENDPOINT = 'https://calendarific.com/api/v2/holidays';

    /**
     * @param Request $request
     *
     * @return string
     */
    public static function getFromRequest(
        Request $request
    ) : string {

        $data = [
            'api_key' => $request->getKey(),
            'country' => $request->getCountry(),
            'year'    => $request->getYear(),
        ];

        if ($month = $request->getMonth()) {
            $data['month'] = $month;
        }

        if ($day = $request->getDay()) {
            $data['day'] = $day;
        }

        if ($location = $request->getLocation()) {
            $data['location'] = $location;
        }

        $query = static::ENDPOINT . '?' . http_build_query($data);

        /**
         * We're unable to `http_build_query` the `$types` as it encodes the
         * commas. The below will add these after the query has been built.
         */
        if ($types = $request->getTypes()) {
            $query .= '&type=' . implode(',', $types);
        }

        return $query;

    }

}

<?php

namespace Calendarific\Api\Client;

interface ClientInterface
{

    /**
     * Fetch the dates.
     *
     * @return array
     */
    public function getDates() : array;

}

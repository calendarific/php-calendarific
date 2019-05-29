<?php

namespace Calendarific\Api\Request;

use Calendarific\Api\Request\Helper\Country;
use Calendarific\Api\Request\Helper\Type;

class Request
{

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $country;

    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * @var string
     */
    private $location;

    /**
     * @var array
     */
    private $types = [];

    /**
     * @param string $key
     * @param string $country
     * @param int $year
     */
    public function __construct(
        string $key,
        string $country,
        int $year
    ) {
        $this->setKey($key);
        $this->setCountry($country);
        $this->setYear($year);
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = (new Country())->validate($country);
    }

    /**
     * @param int $year
     */
    public function setYear(int $year)
    {
        $this->year = $year;
    }

    /**
     * @param int $month
     */
    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    /**
     * @param int $day
     */
    public function setDay(int $day)
    {
        $this->day = $day;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    /**
     * @param array $types
     */
    public function setTypes(array $types)
    {
        $this->types = (new Type())->validate($types);
    }

    /**
     * @return string
     */
    public function getKey() : string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getCountry() : string
    {
        return $this->country;
    }

    /**
     * @return int
     */
    public function getYear() : int
    {
        return $this->year;
    }

    /**
     * @return int|null
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return int|null
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return string|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getTypes() : array
    {
        return $this->types;
    }

}

<?php

namespace Tests\Api\Request;

use Calendarific\Api\Request\Request;
use Tests\AbstractTestCase;

class RequestTest extends AbstractTestCase
{

    public function testRequiredAreSetAndModifiedCorrectly()
    {

        $key = 'api-key-123';
        $country = 'GB';
        $year = 2019;

        $request = new Request(
            $key,
            $country,
            $year
        );

        $this->assertEquals($request->getKey(), $key);
        $this->assertEquals($request->getCountry(), $country);
        $this->assertEquals($request->getYear(), $year);

        $key = 'api-key-123-changed';
        $country = 'US';
        $year = 2021;

        $request->setKey($key);
        $request->setCountry($country);
        $request->setYear($year);

        $this->assertEquals($request->getKey(), $key);
        $this->assertEquals($request->getCountry(), $country);
        $this->assertEquals($request->getYear(), $year);

    }

    public function testOptionalAreSetAndModifiedCorrectly()
    {

        $month = 3;
        $day = 21;
        $location = 'us-ny';
        $types = ['national'];

        $request = new Request('api-key-123', 'us', 2019);
        $request->setMonth($month);
        $request->setDay($day);
        $request->setLocation($location);
        $request->setTypes($types);

        $this->assertEquals($request->getMonth(), $month);
        $this->assertEquals($request->getDay(), $day);
        $this->assertEquals($request->getLocation(), $location);
        $this->assertEquals($request->getTypes(), $types);

        $month = 9;
        $day = 13;
        $location = 'us-al';
        $types = ['local', 'religious'];

        $request->setMonth($month);
        $request->setDay($day);
        $request->setLocation($location);
        $request->setTypes($types);

        $this->assertEquals($request->getMonth(), $month);
        $this->assertEquals($request->getDay(), $day);
        $this->assertEquals($request->getLocation(), $location);
        $this->assertEquals($request->getTypes(), $types);

    }

    /**
     * @expectedException Calendarific\Api\Exception\CountryException
     * @expectedExceptionMessage The country code "ZZ" is invalid.
     */
    public function testCountryDoesNotExist()
    {

        $request = new Request(
            'api-key-123',
            'ZZ',
            2019
        );

    }

    public function testCountryIsAutomaticallyUppercased()
    {

        $country = 'nz';

        $request = new Request(
            'api-key-123',
            $country,
            2019
        );

        $this->assertEquals($request->getCountry(), strtoupper($country));

    }

    /**
     * @expectedException Calendarific\Api\Exception\TypeException
     * @expectedExceptionMessage The type "error" is invalid.
     */
    public function testTypeDoesNotExist()
    {

        $request = new Request('api-key-123', 'GB', 2019);
        $request->setTypes([
            'national',
            'error',
        ]);

    }

    public function testTypesAreAutomaticallyLowercased()
    {

        $types = [
            'NaTiOnAl',
            'LOCAL',
            'religiOUS',
            'observance',
        ];

        $request = new Request('api-key-123', 'GB', 2019);
        $request->setTypes($types);

        $this->assertEquals(
            $request->getTypes(),
            [
                'national',
                'local',
                'religious',
                'observance',
            ]
        );

    }

}

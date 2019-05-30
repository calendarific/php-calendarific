<?php

namespace Tests\Api\Request;

use Calendarific\Api\Request\Request;
use Calendarific\Api\Request\Helper\Query;
use Tests\AbstractTestCase;

class QueryTest extends AbstractTestCase
{

    public function testBasicQueryIsBuilt()
    {

        $this->assertEquals(
            Query::getFromRequest(
                new Request('api-key-123', 'GB', 2019)
            ),
            'https://calendarific.com/api/v2/holidays?api_key=api-key-123&country=GB&year=2019'
        );

    }

    public function testAdvancedQueryIsBuilt()
    {

        $request = new Request('api-key-123', 'us', 2021);
        $request->setMonth(3);
        $request->setDay(21);
        $request->setLocation('us-ny');
        $request->setTypes([
            'local',
            'religious',
        ]);

        $this->assertEquals(
            Query::getFromRequest($request),
            'https://calendarific.com/api/v2/holidays?api_key=api-key-123&country=US&year=2021&month=3&day=21&location=us-ny&type=local,religious'
        );

    }

}

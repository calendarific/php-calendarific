<?php

namespace Calendarific\Api\Client;

use Calendarific\Api\Request\Request;
use Calendarific\Api\Request\Helper\Query;
use Calendarific\Api\Exception\RequestException;
use Jedkirby\Json;

class Client implements ClientInterface
{

    /**
     * @var Request
     */
    private $request;

    /**
     * @param Request $request
     */
    public function __construct(
        Request $request
    ) {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getDates() : array
    {

        $query = Query::getFromRequest(
            $this->request
        );

        $json = Json::decode(
            file_get_contents($query),
            true // Forces the response to an array.
        );

        if (false === $json->isValid()) {
            throw new RequestException(sprintf(
                'Json returned was invalid [%s].',
                $json->getErrorMessage()
            ));
        }

        return $json->getResponse();

    }

}

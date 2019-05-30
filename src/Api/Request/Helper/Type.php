<?php

namespace Calendarific\Api\Request\Helper;

use Calendarific\Api\Exception\TypeException;

class Type
{

    /**
     * @link https://calendarific.com/api-documentation
     *
     * @return array
     */
    private function getAvailable() : array
    {
        return [
            'national',
            'local',
            'religious',
            'observance',
        ];
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    private function isValid(string $type) : bool
    {
        return in_array(
            $type,
            $this->getAvailable()
        );
    }

    /**
     * @param array $types
     *
     * @throws TypeException
     *
     * @return array
     */
    public function validate(array $types) : array
    {
        $return = [];

        foreach ($types as $type) {

            $type = strtolower($type);

            if (false === $this->isValid($type)) {
                throw new TypeException(sprintf(
                    'The type "%s" is invalid.',
                    $type
                ));
            }

            $return[] = $type;

        }

        return $return;
    }

}

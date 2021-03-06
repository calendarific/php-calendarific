<?php

namespace Calendarific\Api\Request\Helper;

use Calendarific\Api\Exception\CountryException;

class Country
{

    /**
     * @link https://calendarific.com/supported-countries
     *
     * @return array
     */
    private function getAvailable() : array
    {
        return [
            'AF',
            'AL',
            'DZ',
            'AS',
            'AD',
            'AO',
            'AI',
            'AG',
            'AR',
            'AM',
            'AW',
            'AU',
            'AT',
            'AZ',
            'BH',
            'BD',
            'BB',
            'BY',
            'BE',
            'BZ',
            'BJ',
            'BM',
            'BT',
            'BO',
            'BA',
            'BW',
            'BR',
            'VG',
            'BN',
            'BG',
            'BF',
            'BI',
            'CV',
            'KH',
            'CM',
            'CA',
            'KY',
            'CF',
            'TD',
            'CL',
            'CN',
            'CO',
            'KM',
            'CG',
            'CD',
            'CK',
            'CR',
            'CI',
            'HR',
            'CU',
            'CW',
            'CY',
            'CZ',
            'DK',
            'DJ',
            'DM',
            'DO',
            'TL',
            'EC',
            'EG',
            'SV',
            'GQ',
            'ER',
            'EE',
            'ET',
            'FK',
            'FO',
            'FJ',
            'FI',
            'FR',
            'PF',
            'GA',
            'GM',
            'GE',
            'DE',
            'GH',
            'GI',
            'GR',
            'GL',
            'GD',
            'GU',
            'GT',
            'GG',
            'GN',
            'GW',
            'GY',
            'HT',
            'VA',
            'HN',
            'HK',
            'HU',
            'IS',
            'IN',
            'ID',
            'IR',
            'IQ',
            'IE',
            'IM',
            'IL',
            'IT',
            'JM',
            'JP',
            'JE',
            'JO',
            'KZ',
            'KE',
            'KI',
            'XK',
            'KW',
            'KG',
            'LA',
            'LV',
            'LB',
            'LS',
            'LR',
            'LY',
            'LI',
            'LT',
            'LU',
            'MO',
            'MK',
            'MG',
            'MW',
            'MY',
            'MV',
            'ML',
            'MT',
            'MH',
            'MQ',
            'MR',
            'MU',
            'YT',
            'MX',
            'FM',
            'MD',
            'MC',
            'MN',
            'ME',
            'MS',
            'MA',
            'MZ',
            'MM',
            'NA',
            'NR',
            'NP',
            'NL',
            'NC',
            'NZ',
            'NI',
            'NE',
            'NG',
            'KP',
            'MP',
            'NO',
            'OM',
            'PK',
            'PW',
            'PA',
            'PG',
            'PY',
            'PE',
            'PH',
            'PL',
            'PT',
            'PR',
            'QA',
            'RE',
            'RO',
            'RU',
            'RW',
            'SH',
            'KN',
            'LC',
            'MF',
            'PM',
            'VC',
            'WS',
            'SM',
            'ST',
            'SA',
            'SN',
            'RS',
            'SC',
            'SL',
            'SG',
            'SX',
            'SK',
            'SI',
            'SB',
            'SO',
            'ZA',
            'KR',
            'SS',
            'ES',
            'LK',
            'BL',
            'SD',
            'SR',
            'SE',
            'CH',
            'SY',
            'TW',
            'TJ',
            'TZ',
            'TH',
            'BS',
            'TG',
            'TO',
            'TT',
            'TN',
            'TR',
            'TM',
            'TC',
            'TV',
            'VI',
            'UG',
            'UA',
            'AE',
            'GB',
            'US',
            'UY',
            'UZ',
            'VU',
            'VE',
            'VN',
            'WF',
            'YE',
            'ZM',
            'ZW',
            'SZ',
        ];
    }

    /**
     * @return bool
     */
    private function isValid(string $code) : bool
    {
        return in_array(
            $code,
            $this->getAvailable()
        );
    }

    /**
     * @throws CountryException
     *
     * @return string
     */
    public function validate(string $code) : string
    {
        $code = strtoupper($code);

        if (false === $this->isValid($code)) {
            throw new CountryException(sprintf(
                'The country code "%s" is invalid.',
                $code
            ));
        }

        return $code;
    }

}

# php-calendarific
Official PHP library for [Calendarific API](https://calendarific.com)

## Installation

```shell
composer require "calendarific/calendarific"
```

## Usage

```php
$ciapi = new Calendarific\v1('_YOUR_API_KEY_');

$parameters = array(
  'country' => 'US',
  'year' => 2019
);

$response = $ciapi->holidays($parameters);
```


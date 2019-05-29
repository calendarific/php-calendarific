Calendarific
-------

Official PHP library for the [Calendarific API](https://calendarific.com).


Installation
-------

This package can be installed via [Composer](https://getcomposer.org):

```shell
$ composer require calendarific/calendarific
```

It requires **PHP >= 7.0.0**.


Usage
-------

The following guide assumes that you've imported the class `Calendarific\Calendarific` into your namespace. There's a helper command available which makes querying the API very easy, and is explained below:

```php
$key = 'api-key-123';
$country = 'GB';
$year = 2019;
$month = null;
$day = null,
$location = null,
$types = ['national'];

$dates = Calendarific::make(
    $key,
    $country,
    $year,
    $month,
    $day,
    $location,
    $types
);
```

The below define's the parameter's for the `Calendarific::make()` helper command:

| Parameter | Type | Required | Description |
| --- | --- | --- | --- |
| `$key`  | `string` | Yes | API Key from [My Account](https://calendarific.com/account) |
| `$country`  | `string` | Yes | Country, as listed from `ISO 3166-1 alpha-2` |
| `$year`  | `int` | Yes | Four digit year representation, i.e. `2019` |
| `$month`  | `int` or `null` | No | Single digit month representation, i.e. `1`  |
| `$location`  | `string` or `null` | No | Location within above Country, as listed from `ISO 3166-1 alpha-2` |
| `$types`  | `array` | No | Array of types to filter using. An empty array will show all types |


Testing
-------

Unit tests can be run within the package, however, it utilises [Docker](https://www.docker.com/community-edition) &amp; [Docker Compose](https://docs.docker.com/compose/install):

```shell
$ docker-compose -f ./docker-compose.yml run --rm cli php ./vendor/bin/phpunit
```


License
-------

**calendarific/calendarific** is licensed under the MIT license.  See the [LICENSE](LICENSE) file for more details.

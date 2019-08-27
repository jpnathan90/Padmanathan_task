# PHP library for [SWAPI] 2019 (http://swapi.co/)

## Usage

Install with Composer: `composer require "jpnathan90/Padmanathan_task:~1.0"`.

```php
require_once __DIR__ . '/vendor/autoload.php';
use SWAPI\SWAPI;

$swapi = new SWAPI;

$swapi->characters()->index();  => Character[]
$swapi->characters()->index(2); => Character[]

$swapi->vehicles()->get(1);     => Vehicle <X-wing>
$swapi->planets()->get(7);      => Planet <Mustafar>

$swapi->people()->get(9999);    => null (not-found)

// Iteration
do {
    if (!isset($starships)) {
        $starships = $swapi->starships()->index();
    } else {
        $starships = $starships->getNext();
    }

    foreach ($starships as $s) {
        echo "{$s->name}\n";
    }
} while ($starships->hasNext());
```

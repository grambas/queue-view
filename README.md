# Laravel 5's Queue Manager



## Install

Via Composer

``` bash
```

## Usage

1- Install

2- Add ServiceProvider to config/app.php

```config/app.php
'providers' => [
  Grambas\QueueView\QueueViewServiceProvider::class,
]

```

3- Run :

```
composer dump-autoload
php artisan vendor:publish --force
```


4- Config published config file, set route and navigate there


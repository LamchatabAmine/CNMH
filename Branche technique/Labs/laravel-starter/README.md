# lab-laravel-starter

## Travail a faire

Creation d'une application laravel avec des packages que nous utillisons


### Packages

* Laravel ui adminlte
    * [https://infyom.com/open-source/laravel-ui-adminlte/docs](https://infyom.com/open-source/laravel-ui-adminlte/docs)

* Flash 
    * [https://github.com/laracasts/flash](https://github.com/laracasts/flash)

* Laravel/collective 
    * [https://github.com/LaravelCollective/html](https://github.com/LaravelCollective/html)


### Realisation

```shell
composer create-project laravel/laravel laravel-starter
```

```shell
composer require infyomlabs/laravel-ui-adminlte
```

```shell
php artisan ui adminlte --auth
```

```shell
npm install && npm run build
```

```shell
composer require laracasts/flash
```

```shell
composer require laravelcollective/html
```

A copie dans fichier config/app.php

```shell
'providers' => [
    Laracasts\Flash\FlashServiceProvider::class,
    Collective\Html\HtmlServiceProvider::class,
],

'aliases' => [
    'Flash' => Laracasts\Flash\Flash::class,
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
],
```

### Extension

* Markdown All in One
  * yzhang.markdown-all-in-one
  
* Todo Tree
  * Gruntfuggly.todo-tree


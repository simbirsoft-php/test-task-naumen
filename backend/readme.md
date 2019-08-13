## Installation

PHP 7.2, Mysql 5.7, Nginx/1.14.0

### Via git clone

1) `git clone http://gitlab.simbirsoft/oleg.popov/test1 myproject`

### Первый запуск

```bash
$ ./init.sh
```

### Запуск контейнеров

```bash
$ ./start.sh
```

### Остановка контейнеров

```bash
$ ./stop.sh
```

## IDE Helper Setup

1) `php artisan ide-helper:meta`

1) `php artisan ide-helper:model`

1) `php artisan ide-helper:generate`

## Usage

Api routes

1) Список атрибутов объектов

    get '/meta/{type}'

2) Актуальное

    get '/list/{type}'
    
3) Архив

    get '/archive/{type}'

4) Редактировать объект

    post '/list/{type}/{uuid}'

5) Поместить в архив

    post '/archive/{type}/{uuid}/set'
    
6) Убрать из архива

    post '/archive/{type}/{uuid}/remove'

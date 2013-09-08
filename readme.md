#Coupon


##System Requirements
- PHP 5.3 or later
- MySql
- Internet (for google chart)

##Folder Structure
    |- app
    |  |- config
    |  |  |- database.php
    |  |- controllers
    |  |- database
    |  |  |- migrations
    |  |- domains
    |  |  |- Base
    |  |  |- Shop
    |  |  |  |- Coupon
    |  |  |  |  |- Stat
    |  |- lang
    |  |  |- en
    |  |  |  | validation.php
    |  |- views
    |  |  | graph.php
    |  | routes.php
    |- public
    |  |- js
    |  |  | graph.js
    | db.sql
    
- `app/config/database.php` - database config e.g, username, password, database name
- `app/controller/` - after route is matched then the function in controller will be called
- `app/database/migrations/` - Create/Drop database schemas code
- `app/domains/` - All business logics are here (modular structure) includeing entities, repositories and valdation rules
- `app/lang/en/validation.php` - Validation messages
- `app/views/graph.php` - html for graph page
- `public/js/graph.js` - create google chart

##Installation
- use `git clone git@github.com:witooh/coupon.git` or download [here](https://github.com/witooh/coupon/archive/master.zip)
- import database schema with `db.sql`
- change database config in `app/config/database.php`

```php
'mysql' => array(
    'driver'    => 'mysql',
    'host'      => '127.0.0.1',
    'database'  => 'coupon',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
),
```
    
- open command line and run command `php artisan migrate:install` for create migration database table
```sh    
$ php artisan migrate:install
```
- and then `php artisan migrate` for create shop, coupon and use_coupon database table. Migration database schemas are created in `app/database/migrations/`
```sh
$ php artisan migrate
```
- you can remove all data in database by run this command `php artisan migrate:refresh`
```sh
$ php artisan migrate:refresh
```

##Using Services

###Create Shop
- method `GET`
- url `<domain>/shop/create`
- parameters:
    - `shop_name` `string` name of shop
    - `owner_username` `string` username of shop owner
    - `owner_password` `string` password of shop owner
- example `http://<domain>/shop/create?shop_name=test&owner_username=user&owner_password=pass`

###Output

```js
{
    "shop_name": "test",
    "owner_username": "user",
    "owner_password": "ff41f462a484668de7784448623d3d0c",
    "id": 1
}
```
    

###Create Coupon
- method `GET`
- url `<domain>/coupon/create`
- parameters:
    - `shop_id` `number` ID of shop
    - `coupon_name` `string` name of coupon
    - `active_date` `string` coupon will be actived in format `YYYY-MM-DD`
    - `expire_date` `string` coupon will be expired in format `YYYY-MM-DD`
- example `http://<domain>/coupon/create?shop_id=1&coupon_name=Buy1Get1&active_date=2013-09-01&expire_date=2013-09-31`

###Output

```js
{
    "shop_id": "1",
    "coupon_name": "Buy1Get1",
    "active_date": "2013-09-01",
    "expire_date": "2013-09-30",
    "id": 1,
    "action": {
        "coupon_id": 31,
        "action": "active",
        "action_time": "2013-09-08T18:46:52+07:00",
        "id": 57
    }
}
```

###Use Coupon
- method `GET`
- url `<domain>/coupon/use`
- parameters:
    - `coupin_id` `number` ID of coupon
    - `action` `string` use coupon for `collected` or `redeemed`
- example collected `http://<domain>/coupon/use?coupon_id=1&action=collected`

###Output

```js
{
    "coupon_id": "1",
    "action": "collected",
    "action_time": "2013-09-08T18:54:37+07:00",
    "id": 1
}
```
- example collected `http://<domain>/coupon/use?coupon_id=1&action=redeemed`

###Output

```js
{
    "coupon_id": "1",
    "action": "redeemed",
    "action_time": "2013-09-08T18:55:31+07:00",
    "id": 2
}
```

##Statistic Page
You can go to the statistic page by `http://<domain>/coupon/graph`

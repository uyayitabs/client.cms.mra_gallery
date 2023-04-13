# Photo Gallery

Photo gallery for motorsport based on events/venues/categories/photographers with all images being stored on AWS S3

## Installation

Pre-requisites:
- PHP 8
- MySQL
- composer

### Setting up the project:

```bash
composer install
php artisan optimize:clear
```
### First-time database setup
```bash
php artisan migrate
```

### Seeding some test data

```bash
php artisan db:seed
```

### Local test site
Use Laravel Valet or built-in php
```bash
php artisan serve
```


### Test user data

#### Admin
[http://localhost:8000/admin](http://localhost:8000/admin)

```bash
admin / password
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

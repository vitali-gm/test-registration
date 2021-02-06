## Installation

```bash
$ git clone https://github.com/vitali-gm/test-registration.git
$ cd test-registration
$ cp .env.exaple .env
$ nano .env
```
### Set your data

```bash
#DB
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=12345678

#MAIL
MAIL_MAILER=smtp
MAIL_HOST=null
MAIL_PORT=465
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
```

### Save .env file and run next commands
```bash
$ composer install
$ php artisan migrate
$ php artisan key:generate
$ php artisan serve
```

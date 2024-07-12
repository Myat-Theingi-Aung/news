#  UI Conversion and CRUD Implementation

## Installation

Clone the repo locally:
```
git clone https://github.com/Myat-Theingi-Aung/news.git
```

`cd` into cloned directory and install dependencies. run below command one by one.
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### Configuration in `.env` file

Database **eg.**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=news
DB_USERNAME=root
DB_PASSWORD=root
```

## Database Migration

Run database migrations:
```
php artisan migrate
```

Run database seeder:
```
php artisan db:seed
```

## Server Run

Run the dev server:
```
npm run dev
php artisan serve
```

Visit below url:
```
http://localhost:8000
```

## Features

Main feature:
```
Able to create account easily and fastly in register page
Able to view all news by latest published_date in home page
```

user:
```
Able to make news CRUD
Able to view all users profile and their news
Able to edit own profile
```

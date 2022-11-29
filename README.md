## Installation

copy .env.example to .env
composer install
npm install
php artisan key:generate

create DB with name mikroblogas and run:
php artisan migrate
php artisan db:seed

php artisan serve
npm run dev

## 3rd party API routes

http://localhost:8000/api/get-posts
http://localhost:8000/api/get-posts-by-user/{user_id}
http://localhost:8000/api/get-posts-post-with-comments/{post}

## Auth

authentification is immitated by changing

VITE_USER_ID in .env

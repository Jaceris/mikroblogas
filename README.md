## Installation

copy .env.example to .env
php artisan key:generate
create DB mikroblogas
npm install
composer install
php artisan migrate
php artisan db:seed

## 3rd party API routes

http://localhost:8000/api/get-posts
http://localhost:8000/api/get-posts-by-user/{user_id}
http://localhost:8000/api/get-posts-post-with-comments/{post}

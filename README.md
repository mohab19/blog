# Blog App project

This is a simple app as blog that adds posts and import posts from other site
it is implemented with queues to improve the connectivity and handle the request failure.  

## Installation

After you clone the project from the GitHub, open a console from the root folder,
and write the following command:
    composer install

then
    ./vendor/bin/sail up

when the docker images is up and running, open the laravel cmd,
and run the next command:
    php artisan migrate

then
    php artisan db:seed

to run the schedular, write:
    php artisan schedule:work

you can open another cmd to run the queue worker in the same time:
    php artisan queue:work

to run unit/feature tests, write:
    php artisan test

phpMyAdmin is add for ease of useing the db on:
    http://localhost:8888/

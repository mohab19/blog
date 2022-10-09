# Blog App project

    This is a simple app as blog that adds posts and import posts from other site
    it is implemented with queues to improve the connectivity and handle the request failure.  

## Installation

    After you clone the project from the GitHub, open a console from the root folder,
    and write the following command

    ```bash
    composer install
    ```

    then
    ```bash
    ./vendor/bin/sail up
    ```

    when the docker images is up and running, open the laravel cmd,
    and run the next command:
    ```bash
    php artisan migrate
    ```

    then
    ```bash
    php artisan db:seed
    ```

    to run the schedular, write:
    ```bash
    php artisan schedule:work
    ```

    you can open another cmd to run the queue worker in the same time:
    ```bash
    php artisan queue:work
    ```

    to run unit/feature tests, write:
    ```bash
    php artisan test
    ```

    phpMyAdmin is add for ease of useing the db on:
    ```bash
    http://localhost:8888/
    ```

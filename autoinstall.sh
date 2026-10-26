#!/bin/bash

docker compose up

docker compose run --rm composer composer install
docker compose run --rm node npm install
docker compose run --rm node npm run build
docker compose run --rm app php artisan migrate --seed
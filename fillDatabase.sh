#!/bin/bash


#php artisan migrate:fresh

#php artisan db:seed --class=CategorySeeder


heroku run php artisan migrate 

heroku run php artisan db:seed --class=CategorySeeder 
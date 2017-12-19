# vehicle-tracking-system
A simple vehicle tracking system

# How to run image processing server
- Install `pip` for python 2.7 from https://pip.pypa.io/en/stable/installing/
- Go to **recognition-server** folder
- Open Command Prompt
- Run `pip install -r requirements.txt`
- Then `python server.php`
- Your server should start now on port 5000

# How to run website
- Go to web
- copy .env.example as .env
- Get your google api key from https://developers.google.com/maps/documentation/javascript/ , this will be needed for setup GOOGLE_MAPS_API_KEY
- Run `composer install`
- Run `npm install`
- Then run `php artisan migrate:fresh`
- Run `php artisan storage:link`
- Then `php artisan serve`
- Run `php artisan db:seed`
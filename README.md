# vehicle-identification-system
A simple vehicle tracking system(VIS)

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
- Get your SMTP credentials and put them in .env for emails, if you cant use **log** as mail driver
- Run `composer install`
- Run `npm install`
- Run `php artisan vis:install` this will spin up the installer and will do any necessary actions and will also create a dummy account for admin with 
  **nic** = 123456789,
  **password** = admin
- Start your server by `php artisan serve`
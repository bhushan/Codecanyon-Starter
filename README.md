# Codecanyon Starter

[![Build Status](https://travis-ci.com/bhushangaykawad/Codecanyon-Starter.svg?branch=master)](https://travis-ci.com/bhushangaykawad/Codecanyon-Starter) [![StyleCI](https://github.styleci.io/repos/229913928/shield?branch=master)](https://github.styleci.io/repos/229913928)

## A codecanyon starter template using Laravel and Vue.js

### Key Features

- User Role Based Access
- Application Rebranding Easily

## Installation

### Prerequisites

- To run this project, you must have PHP 7.2 installed.
- You should setup a host on your web server for your local domain. For this you could also configure Laravel Homestead or Valet.

### Step 1

 Begin by cloning this repository to your machine, and installing all Composer & NPM dependencies.

 ```bash
git clone https://github.com/bhushangaykawad/Codecanyon-Starter.git
cd Codecanyon-Starter
composer install
npm install && npm run dev
```

Note: It may take a while because it is going to install many dependencies.

### Step 2

Now copy ```.env.example``` to ```.env```
 and setup your database credentials there.
Once that is complete run following commands.

 ```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### Credentials

Admin :  
    email :     bhushan@enlight.test  
    password :  password  

Normal User :  
    email :     jane@enlight.test  
    password :  password  

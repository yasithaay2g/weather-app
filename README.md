# weather-app
Laravel ,Vue.js and inertia.js 



<p align="center"><a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a>  
  <a href="https://vuejs.org/" target="_blank"><img src="https://avatars.githubusercontent.com/u/6128107?s=200&v=4 width="400"></a> 
        <a href="https://inertiajs.com/" target="_blank"><img src="https://raw.githubusercontent.com/inertiajs/inertia/master/.github/LOGO.png" width="400"></a>  
</p>



## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## About Inertia.js  
Inertia.js lets you quickly build modern single-page React, Vue and Svelte apps using classic server-side routing and controllers. Find full documentation at   <a href="https://inertiajs.com/" target="_blank">inertiajs.com.</a>
 
      
## About Vue.js  
An approachable, performant and versatile framework for building web user interfaces.<a href="https://vuejs.org/" target="_blank">Vue.js</a>
      
      
      
<h1 align="center">
  <br>
  <a href="https://github.com/yasithaay2g">
  <img src="https://camo.githubusercontent.com/3ffeeb909e0da9579263d2243605cc7b1fecff9fb3f686bffb7dc002c39120d7/68747470733a2f2f692e696d6775722e636f6d2f3141324834376c2e706e67" alt="Weather App" width="250">
  </a>
  <br>
  Weather App
  <br>
</h1>
<div align="center">
  :computer:
</div>
<div align="center">
  Simple Weather App
</div>

<br />

<div align="center">
  <sub>Shared by
  <a href="https://github.com/yasithaay2g">
  Yasitha Rukshan
  </a>
</div>


## Intro
 Weather  using Laravel, Vue.js and Inertia.js with extensible dependency injection implementation and <b>Repository Pattern.</b>


## Installation

### Requierements
- PHP (Laravel 8.x)
- MySQL/SQLite
- Vue.js
- <a href="https://inertiajs.com/" target="_blank">inertiajs.com.</a>
- Open Weather API / https://openweathermap.org/api/one-call-api


### First steps
Clone repo
 ```bash
git clone https://github.com/yasithaay2g/weather-app.git
```
 
 Important: you must rename **.env.example** to **.env** file and set proper environment variables.
  ```bash
cp .env.example .env
 ```  
 
 | Variable |  Description | Example Value |
 |:----|:-------------|:-----|
 | Lat | latitude | -37.77|
 | Lon | longitude | 145.05 |
 | exclude | openweathermap api secret key | XXXXXXXXXXXXXXXXXXXXXX |
 | appid | openweathermap api url | minutely |
 
 


### Computer installation
 
 Install dependencies
 ```bash
    composer install
    npm install
 ```
 Create database (Laragon/xampp)
  ```bash
    DB Name : weather_app
 ```
 Migration run
  ```bash
    php artisan migrate
 ```
  User seed  run
  ```bash
    php artisan db:seed
 ```
  Run project 
  ```bash
    php artisan serve
    npm run watch
 ```
###Test User Credential

- email : user@gmail.com
- pass : 12345678

###URLs
      
- Login : http://127.0.0.1:8000/login
- Register : http://127.0.0.1:8000/register

      
      
      
 ###Breeze & Vue
      
      
Laravel Breeze also offers React and Vue scaffolding via an Inertia.js frontend implementation. Inertia allows you to build modern, single-page React and Vue applications using classic server-side routing and controllers.

Inertia lets you enjoy the frontend power of React and Vue combined with the incredible backend productivity of Laravel. To use an Inertia stack, specify vue or react as your desired stack when executing the breeze:install Artisan command:   
      
      
      
 Thank You











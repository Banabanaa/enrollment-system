<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to Install necessary resources before running

   Laravel Guide : https://laravel.com/docs/11.x/installation  
   Youtube Guide for laravel installation : https://www.youtube.com/watch?v=2qgS_MCvDfk  
   Youtube Guide for Laravel/breeze installation : https://www.youtube.com/watch?v=Et068bVFstY  

1. Make sure to install PHP, XAMPP, Composer, Node.js :  
   installation links :  
   XAMPP - https://www.apachefriends.org/download.html  
   PHP - https://www.php.net/downloads.php  
   Composer - https://getcomposer.org/download/  
   Node.js - https://nodejs.org/en  

   - in XAMPP, php.ini file un-comment or remove ';' symbol in the following :  
     extension=pdo_mysql  
     extension=mbstring  
     extension=gettext  
     extension=fileinfo  
     extension=exif  
     *DO note that extension=mongodb is an addition and not available in the normal php.ini ; don't mind it!  

   - after running and installing composer go to your PATH and add the bin file path to it, it may look like this  
            C:\Users\user\AppData\Roaming\Composer\vendor\bin  
     *If you installed Node.js first, there is an option to automatically add it to the path. If not added, manually add it!
  
   - to check if PHP is successfully installed, type in the CMD "php -v"*  
   - to check if Node or npm is installed, type in the CMD "node -v" and "npm -v"*  

## How to clone this project on VS Code

1. to clone this repository, open Visual Studio Code (VS Code) and type git clone <repository-link>
2. open/navigate to the cloned repository
3. open the terminal and run the following commands:
   ```
   composer install
   npm install
   ```
   this will take a while just wait.
   
   ```
   cp .env.example .env
   (make sure to uncomment the database configurations in the .env file)
   ```
   ```
   php artisan key:generate
   ```
   ```
   php artisan migrate
   php artisan db:seed
   ```

   run both of these command in different terminal:
   ```
   php artisan serve
   npm run dev
   ```

   you will be able to access the application at `http://localhost:8000`.


### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



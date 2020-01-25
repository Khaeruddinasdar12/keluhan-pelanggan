<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Informasi Aplikasi
1) Menggunakan Framework Laravel 6
2) Menggunakan Mysql sebagai database
3) Menggunakan Jquery dan yajra datatable

Aplikasi ini adalah keluhan pelanggan yang sangat sederhana, bagian atau departmen yang dituju untuk dilaporkan merupakan data statis yang ada di database, namun tidak ada untuk penambahan data di aplikasi.

## Instalasi

Kebutuhan :
* Xampp
* Composer

1. Download Aplikasi ini 
2. Akses foldernya di cmd atau terminal lalu ketikkan composer install (koneksi internet)
3. Setelah itu paste perintah berikut di cmd atau terminal :
	composer require yajra/laravel-datatables-oracle:"~9.0"

4. Kemudian Tambahkan di script berikut di config/app.php
	'providers' => [
    ...,
    Yajra\DataTables\DataTablesServiceProvider::class,
	]

	'aliases' => [
	    ...,
	    'DataTables' => Yajra\DataTables\Facades\DataTables::class,
	]

5. Lalu jalankan perintah ini 
	php artisan vendor:publish --provider="Yajra\DataTables\DataTablesServiceProvider

6. Setting Env Anda, file .env.example yang ada di dalam folder project Anda, rename file tersebut ubah menjadi .env

7. Jalankan Perintah 
	php artisan key:generate

8. Edit env Anda , perhatikan format berikut :
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nama_db
	DB_USERNAME=user_db
	DB_PASSWORD=password_db

9. Karena aplikasi ini memiliki fitur send email, maka atur di env sebagai berikut :
	MAIL_DRIVER=smtp
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=465
	MAIL_USERNAME=gmail_anda
	MAIL_PASSWORD=password_gmail_anda
	MAIL_ENCRYPTION=ssl

10. Pastikan email Anda tidak verifikasi 2 akun, dan less secure app access nya on.
11. Ketikkan perintah php artisan migrate:refresh --seed di cmd atau terminal
12. Ketikkan perintah php artisan serve di cmd atau terminal
13. Ketik localhost:8000 di browser untuk halaman pelanggan
14. ketik localhost:8000/app/admin 
	login dengan 
	email : angelica@gmail.com
	password : 12345678
15. Selamat menikmati. 


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

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
2. Akses foldernya di cmd atau terminal lalu ketikkan ```composer install``` (koneksi internet)
4. Setting Env Anda, Ubah nama file ```.env.example``` menjadi ```.env```

5. Jalankan Perintah ```php artisan key:generate```
6. Edit env Anda , perhatikan format berikut :
	```
    DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nama_db
	DB_USERNAME=user_db
	DB_PASSWORD=password_db
    ```
9. Karena aplikasi ini memiliki fitur send email, maka atur di env sebagai berikut :
    ```
	MAIL_DRIVER=sendmail
	MAIL_HOST=smtp.gmail.com
	MAIL_PORT=465
	MAIL_USERNAME=gmail_anda
	MAIL_PASSWORD=password_gmail_anda
	MAIL_ENCRYPTION=ssl
    ```

7. Pastikan email Anda tidak verifikasi 2 akun, dan less secure app access nya on.
8. Ketikkan perintah ```php artisan migrate:refresh --seed``` di cmd atau terminal
9. Masih cmd yang sama ketikkan perintah ```php artisan serve```
10. Ketik ```localhost:8000``` di browser untuk halaman pelanggan
11. ketik ```localhost:8000/app/admin```
	login dengan 
	> email : angelica@gmail.com <br>
	> password : 12345678
12. Selamat menikmati. 


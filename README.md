<p align="center">Dibuat Menggunakan Framework Laravel Versi 11 dan Php versi 8.2.</p>

# ERD (Entity Relationship Diagram)
![Screenshot 2024-09-19 200406](https://github.com/user-attachments/assets/4b706c66-046f-447f-8ce5-38c1640a6bde)

## Panduan Install
### Jangan lupa run XAMPP atau Laragonnya
## Lanjut
1. **Clone Repository**

```bash
git clone https://github.com/ahmad-fahrudin/perums-application.git
cd perums-application
composer install
cp .env.example .env
```

2. **Buka `.env` lalu ubah baris berikut, atau menggunakan database di folder database SQL**

```bash
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```


3. **Instalasi Aplikasi**

```bash
php artisan key:generate
php artisan migrate --seed
```

4. **Jalankan Aplikasi**

```bash
php artisan serve

```

## Preview

![Screenshot 2024-08-27 060445](https://github.com/user-attachments/assets/1b611fb9-eec4-42ff-a951-08af7b94d7ec)

![Screenshot 2024-08-27 060515](https://github.com/user-attachments/assets/e06cec9f-1c97-47f9-8fc3-4837c3e3caff)

![Screenshot 2024-08-27 060535](https://github.com/user-attachments/assets/2783e174-701d-4c48-a33c-14ab0749e7db)

![Screenshot 2024-08-27 060546](https://github.com/user-attachments/assets/4b5429c3-6b97-4db1-88b1-f29a195c531d)

![Screenshot 2024-08-27 060631](https://github.com/user-attachments/assets/c0a44b41-b706-4a7e-ac8c-517b742f90ed)

![Screenshot 2024-08-27 060654](https://github.com/user-attachments/assets/53541440-1631-4f02-9500-dea7a8f48452)

![Screenshot 2024-08-27 060907](https://github.com/user-attachments/assets/0b40ea6a-907c-49a8-9a06-99406d5cc648)

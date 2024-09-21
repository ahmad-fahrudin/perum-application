# <p align="center">Dibuat Menggunakan Framework Laravel Versi 11 dan Php versi 8.2.</p>

### <p align="center">ERD (Entity Relationship Diagram) paling bawah 👇 👇 👇</p>


## Panduan Install
### Jangan lupa run XAMPP atau Laragonnya, Lanjut :
1. **Clone Repository**

```bash
git clone https://github.com/ahmad-fahrudin/perum-application.git
cd perum-application
composer install
npm install & npm run dev
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
## Akun Default

-   email: admin@gmail.com
-   Password: password123

## Preview
1. **Fitur Dashboard**
<p>Informasi jumlah Penghuni, Rumah, Pembayaran, dan Pengeluaran. lalu ada informasi User yang login, sistem yang kita gunakan dan ada Grafik Diagram</p>

![Screenshot 2024-09-19 214633](https://github.com/user-attachments/assets/63b4fbab-c549-4f9b-8d79-6eecd491c103)

2. **Fitur Majanemen Penghuni**
<p>Infomasi didalam table, lalu ada Form buat Create dan Edit Penghuni</p>

![Screenshot 2024-09-19 214736](https://github.com/user-attachments/assets/591d092c-60e7-49e5-b03b-18fe25547008)

3. **Fitur Majanemen Rumah**
<p>Infomasi didalam table, lalu ada Form buat Create dan Edit Rumah. ada fitur status Huni dan Status bayar jika kita klik akan keluar session message memunculkan informasi yang dibutuhkan</p>

![Screenshot 2024-09-19 214750](https://github.com/user-attachments/assets/6f134acc-453b-4eb5-9c1c-06c406859d7c)

4. **Fitur Majanemen Keuangan Pembayaran**
<p>Infomasi didalam table, lalu ada Form buat Create dan Edit Pembayaran</p>

![Screenshot 2024-09-19 214836](https://github.com/user-attachments/assets/99388a1a-93d7-4d26-88cc-37d535897b7c)

5. **Fitur Majanemen Keuangan Pengeluaran**
<p>Infomasi didalam table, lalu ada Form buat Create dan Edit pengeluaran</p>

![Screenshot 2024-09-19 214944](https://github.com/user-attachments/assets/57b9d830-e48b-417b-a2b2-d05fec328131)

6. **Fitur Ringkasan**
<p>Infomasi didalam table, lalu ada Form buat Create dan Edit Ringkasan Bulan/Tahun</p>

![Screenshot 2024-09-19 215045](https://github.com/user-attachments/assets/3ce7d069-8a96-4c25-b42d-224d2ad68dff)

7. **Fitur Data user**
<p>Infomasi didalam table, lalu ada Form buat Edit Data User bisa juga ubah password disini</p>

![Screenshot 2024-09-19 215104](https://github.com/user-attachments/assets/cda4339a-cc48-434b-a397-09efc2689c1e)


# ERD (Entity Relationship Diagram)
![Screenshot 2024-09-19 200406](https://github.com/user-attachments/assets/4b706c66-046f-447f-8ce5-38c1640a6bde)


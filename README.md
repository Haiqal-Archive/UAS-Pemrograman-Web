# Proyek UAS Pemrograman Web - CMS CodeIgniter 3

Proyek ini adalah tugas Ujian Akhir Semester (UAS) untuk mata kuliah Pemrograman Web. Aplikasi ini adalah Content Management System (CMS) sederhana berbasis CodeIgniter 3 yang dijalankan menggunakan Docker.

## Fitur Utama
1. **Otentikasi User:** Login admin dengan session database yang aman.
2. **Manajemen Artikel (CRUD):** Tambah, Edit, Hapus artikel.
3. **Upload Gambar:** Fitur upload gambar pada artikel dengan keamanan file.
4. **Database Migrations:** Setup database otomatis tanpa perlu import SQL manual.
5. **Dockerized:** Lingkungan pengembangan terisolasi dan konsisten.

## Prasyarat
Satu-satunya yang Anda butuhkan adalah:
- **Docker Desktop** (atau Docker Engine + Docker Compose di Linux)

Tidak perlu menginstall XAMPP, PHP, atau MySQL secara manual.

---

## Cara Menjalankan (Langkah demi Langkah)

Ikuti langkah ini untuk menjalankan aplikasi:

### 1. Build dan Jalankan Container
Buka terminal di root folder proyek, lalu jalankan:
```bash
docker compose up -d --build
```
Tunggu hingga proses selesai.

### 2. Setup Database & Migrasi (Wajib)
Database awal masih kosong. Jalankan perintah ini untuk membuat tabel (user, artikel, sessions) dan mengisi data awal (seeding):
```bash
curl "http://localhost:8080/index.php/migrate"
```
*Jika sukses, akan muncul pesan: `Migration executed successfully!`*

### 3. Setup Permissions Upload Gambar (Jika Diperlukan)
Aplikasi akan mencoba membuat folder upload secara otomatis. Namun, jika terjadi error "Permission Denied", jalankan perintah ini agar container memiliki akses menulis:
```bash
docker exec -u 0 ci3_web chown -R www-data:www-data /var/www/html/uploads/artikel
```

### 4. Akses Aplikasi
Buka browser dan kunjungi:
**[http://localhost:8080/](http://localhost:8080/)**

---

## Akun Login (Admin)
Gunakan kredensial berikut untuk masuk ke dashboard:
- **Email:** `admin@example.com`
- **Password:** `admin123`

---

## Perintah Berguna Lainnya

### Melihat Isi Database via Terminal
Anda bisa melihat isi tabel langsung tanpa tool gui menggunakan script yang disediakan:
```bash
# Lihat daftar user
./scripts/get_users.sh

# Lihat daftar artikel
./scripts/get_artikel.sh
```

### Mematikan Aplikasi
```bash
# Hentikan aplikasi
docker compose down

# Hentikan aplikasi & HAPUS database (Reset Ulang)
docker compose down -v
```
*Catatan: Jika Anda menjalankan `docker compose down -v`, database akan kembali bersih. Anda perlu menjalankan langkah Migrasi lagi saat menyalakannya kembali.*

---

## Masalah Umum (Troubleshooting)
1. **Error "Database Error occurred" saat buka web?**
   - Pastikan Anda sudah menjalankan langkah nomor **2 (Migrasi)**.

2. **Gambar tidak bisa diupload?**
   - Pastikan Anda sudah menjalankan langkah nomor **3 (Permissions)**.

3. **Port already in use?**
   - Jika port 8080 atau 3306 bentrok, ubah mapping port di file `docker-compose.yml`.

---
**Nama Mahasiswa:** Haiqal Alyhazamy
**NIM:** 2410050

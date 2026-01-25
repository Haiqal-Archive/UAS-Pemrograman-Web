# RustHub Docs Portal 🦀
**Proyek UAS Pemrograman Web**

**RustHub Docs** adalah portal dokumentasi berbasis komunitas yang dibangun menggunakan **CodeIgniter 3**.
Berbeda dengan blog konvensional, proyek ini dirancang dengan tema gelap yang ramah bagi developer, lengkap dengan *syntax highlighting*, struktur sidebar dokumentasi, dan integrasi tipografi ala "Code Editor".

Dibuat untuk memenuhi tugas **Ujian Akhir Semester (UAS)** mata kuliah Pemrograman Web.

---

## 🚀 Fitur Unggulan

### 1. Developer-Centric Frontend
- **Tema Gelap (Rust/VSCode Style):** Desain UI menggunakan palet warna `Charcoal` & `Rust Orange` agar nyaman dibaca developer.
- **Syntax Highlighting:** Integrasi **Prism.js** untuk mempercantik kode snippet pada artikel.
- **Font Coding:** Menggunakan font `Fira Code` untuk memberikan nuansa "IDE" di web.

### 2. Autentikasi & Keamanan
- Login Admin dengan *Bcrypt Hashing*.
- Proteksi folder upload (Block PHP execution via `.htaccess`).
- Isolasi Database Session.

### 3. CMS / Admin Panel
- **Manajemen Modul (Artikel):** CRUD full untuk menambah dokumentasi atau tutorial baru.
- **Upload Gambar:** Menyertakan diagram atau screenshot pada dokumentasi.
- **Dashboard Overview:** Ringkasan konten yang tersedia.

### 4. Database & Migrations
- Tidak perlu import SQL manual. Cukup jalankan perintah migrasi.
- Struktur tabel otomatis dibuat saat migrasi pertama kali.

---

## 🛠️ Stack Teknologi

- **Backend:** PHP 8.0 + CodeIgniter 3 (HMVC structure ready)
- **Frontend:** Bootstrap 5 + Custom CSS (Rust Theme) + Prism.js
- **Database:** MariaDB 10.6
- **Infrastructure:** Docker & Docker Compose
- **Scripting:** Bash scripts untuk utility check.

---

## 📂 Struktur Database

- `users` : Menyimpan data kontributor/admin.
- `artikel` : Menyimpan konten dokumentasi (Judul, Slug, Konten, Gambar).
- `ci_sessions` : Session storage berbasis database untuk keamanan ekstra.

---

## 💻 Cara Menjalankan (3 Langkah Mudah)

### 1. Siapkan Proyek
Pastikan Docker Desktop sudah menyala.
```bash
git clone https://github.com/haiqal/RustHub-Docs.git
cd RustHub-Docs
docker compose up -d --build
```

### 2. Inisiasi Database
Jalankan perintah ini **sekali saja** untuk setup tabel dan data admin awal:
```bash
curl "http://localhost:8080/index.php/migrate"
```
*Tunggu hingga muncul pesan sukses.*

### 3. Akses
- **Portal Publik:** [http://localhost:8080/](http://localhost:8080/)
- **Admin Login:** [http://localhost:8080/login](http://localhost:8080/login)

**Default Credential:**
- Email: `admin@example.com`
- Password: `admin123`

---

## 📝 Catatan Penting
- **Upload Permission:** Jika upload gambar gagal di Linux/Mac, jalankan:
  ```bash
  docker exec -u 0 ci3_web chown -R www-data:www-data /var/www/html/uploads/artikel
  ```
- **Port Conflict:** Jika port 8080 terpakai, ubah di `docker-compose.yml`.

---
**Nama Mahasiswa:** Haiqal Alyhazamy
**NIM:** 2410050
**Mata Kuliah:** Pemrograman Web

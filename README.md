# CMS CI3 (Tugas Kampus) — Dockerized

Proyek ini adalah tugas dari kampus yang menggunakan CodeIgniter 3 (CI3). Agar lebih praktis, aman, dan mudah dikembangkan, proyek ini telah diberi beberapa refinement:

- Orkestrasi dengan Docker & Docker Compose
- Skrip utilitas (scripts/) untuk query cepat ke database
- Konfigurasi lingkungan melalui environment variables

Tidak perlu memasang PHP, Apache, atau MariaDB langsung di mesin; cukup gunakan Docker. Ini menghindari konflik versi, mempermudah onboarding, dan menyederhanakan proses run/test.

## Mengapa pendekatan ini lebih baik?
- **Isolasi lingkungan:** Semua dependency (PHP, Apache, MariaDB) berada di container, menghindari bentrok versi di mesin lokal.
- **Reproducible:** Perilaku konsisten di setiap mesin—cukup `docker compose up`.
- **Mudah di-setup:** Tanpa instalasi manual; hanya butuh Docker.
- **Lebih aman:** Variabel sensitif seperti `ENCRYPTION_KEY` diset via environment, sesi disimpan di database (`ci_sessions`).
- **Portabel:** Mudah dibawa dan dijalankan di environment lain.

## Prasyarat
- Docker dan Docker Compose

## Menjalankan Aplikasi
```bash
# Build dan jalankan
docker compose up -d --build

# Hentikan kontainer (data tetap)
docker compose down

# Hentikan dan hapus kontainer + volume (data hilang)
docker compose down -v
```
Aplikasi dapat diakses di: http://localhost:8080/

## Database
- Service: `db` (MariaDB 10.6)
- Nama DB: `cms_db`
- User/Pass: `root` / `root`
- Volume: `db_data` (persisten)

Kredensial ini diatur dalam [docker-compose.yml](docker-compose.yml).

### Melihat Data (contoh)
```bash
# Masuk ke DB container
docker exec -it ci3_db mysql -uroot -proot -D cms_db

# Query cepat jumlah artikel
mysql -h 127.0.0.1 -P 3306 -uroot -proot -D cms_db -e "SELECT COUNT(*) FROM artikel;"
```

## Migrasi & Seed
Migrasi diaktifkan, dan tersedia controller untuk menjalankan migrasi.
```bash
# Jalankan migrasi (latest)
curl "http://localhost:8080/index.php/migrate"
```
Migrasi yang disertakan:
- Membuat tabel `artikel` dengan seed contoh
- Membuat tabel `user` dan men-seed admin
- Membuat tabel `ci_sessions` untuk sesi berbasis database

## Login
Kredensial admin seed:
- Email: `admin@example.com`
- Password: `admin123`

Setelah login, Anda akan diarahkan ke halaman admin.

## Skrip Utilitas (scripts/)
- [scripts/get_users.sh](scripts/get_users.sh): Menampilkan data dari tabel `user`.
- [scripts/get_artikel.sh](scripts/get_artikel.sh): Menampilkan data dari tabel `artikel`.

Contoh pakai:
```bash
# Default query user
./scripts/get_users.sh

# Query custom
./scripts/get_users.sh "SELECT id, username FROM user;"

# Artikel
./scripts/get_artikel.sh
```

## Konfigurasi Penting
- Base URL diatur via env `BASE_URL` (lihat [application/config/config.php](application/config/config.php)).
- Koneksi DB via env: `DB_HOST`, `DB_USER`, `DB_PASS`, `DB_NAME`.
- Kunci enkripsi: `ENCRYPTION_KEY` (diatur di `docker-compose.yml`).
- Sesi: driver `database`, tabel `ci_sessions`, `cookie_httponly = TRUE` untuk keamanan.

## Troubleshooting
- **Tidak bisa login / session hilang:** Pastikan tabel `ci_sessions` ada dan kontainer `db` berjalan.
- **Port 3306 bentrok:** Stop MySQL lokal atau ubah mapping port di [docker-compose.yml](docker-compose.yml).
- **Data hilang setelah down -v:** Volume dihapus; jalankan ulang migrasi untuk seed kembali.

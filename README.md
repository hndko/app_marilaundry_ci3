# MariLaundry 🧺

**Sistem Manajemen Laundry yang Modern dan Efisien**

MariLaundry adalah aplikasi berbasis web komprehensif yang dirancang untuk menyederhanakan operasional bisnis laundry. Dibangun dengan fokus pada kecepatan, keandalan, dan pengalaman pengguna yang modern, platform ini memudahkan pemilik laundry untuk mengelola transaksi, pelanggan, layanan, dan keuangan dalam satu dashboard terintegrasi.

---

## ✨ Fitur Utama

### 📊 Dashboard & Analitik Lanjutan

- **Pelacakan KPI Langsung**: Pantau total pesanan, pelanggan aktif, dan pendapatan secara sekilas.
- **Tren Pendapatan**: Grafik interaktif yang menunjukkan perkembangan pemasukan bulanan.
- **Distribusi Layanan**: Visualisasi layanan laundry yang paling banyak diminati.
- **Aktivitas Terbaru**: Pantauan cepat pesanan terbaru beserta statusnya.

### 💼 Manajemen Inti

- **Input Transaksi**: Alur kerja efisien untuk pembuatan pesanan, penimbangan, dan pemilihan layanan.
- **Data Master**: Database Pelanggan dan Layanan Laundry yang lengkap (CRUD).
- **Keuangan & Pengeluaran**: Pantau biaya operasional untuk menjaga kesehatan finansial bisnis.
- **Laporan**: Generate laporan harian/bulanan dengan fitur ekspor ke PDF.

### 📱 Sistem Notifikasi

- **Integrasi WhatsApp**: Pembaruan status pesanan (Siap Diambil/Selesai) yang dikirim otomatis ke pelanggan melalui API Fonnte.
- **Status Real-time**: Menjaga pelanggan tetap terinformasi dan meningkatkan kepuasan layanan.

### 🔒 Keamanan & Manajemen User

- **Kontrol Akses Berbasis Role (RBAC)**: Pembagian peran yang jelas untuk **Super Admin, Admin, Owner, dan Operator**.
- **Autentikasi Modern**: Login aman dengan hashing password dan antarmuka _split-screen glassmorphism_ yang menawan.
- **Proteksi Sistem**: Perlindungan akun inti sistem dari modifikasi yang tidak sah.

---

## 🛠️ Stack Teknologi

| Lapisan            | Teknologi                            |
| ------------------ | ------------------------------------ |
| **Framework Inti** | PHP / CodeIgniter 3.1.13             |
| **Database**       | MySQL (Optimasi UTF8mb4 untuk Emoji) |
| **Frontend UI**    | AdminLTE 3 / Bootstrap 4             |
| **UI Interaktif**  | Chart.js, DataTables, SweetAlert2    |
| **Integrasi**      | API Gateway WhatsApp Fonnte          |
| **Tools**          | Composer, PHPUnit (Dev)              |

---

## ⚙️ Instalasi & Setup

1. **Clone repository**:

   ```bash
   git clone https://github.com/username-anda/app_marilaundry_ci3.git
   ```

2. **Konfigurasi Database**:
   - Buat database dengan nama `db_marilaundry`.
   - Import struktur SQL yang tersedia atau jalankan migrasi.

3. **Install Dependensi**:

   ```bash
   composer install
   ```

4. **Konfigurasi Lingkungan**:
   - Salin file `.env.example` menjadi `.env`:
     ```bash
     cp .env.example .env
     ```
   - Buka file `.env` dan sesuaikan kredensial database Anda (Username, Password, Nama Database).
   - Konfigurasikan API Key WhatsApp di menu pengaturan aplikasi di dalam dashboard.

---

## 📸 Pratinjau

_(Struktur untuk screenshot portfolio Anda)_

| Halaman Login                                        | Dashboard                                                    |
| ---------------------------------------------------- | ------------------------------------------------------------ |
| ![Redesain Login](assets/dist/img/preview_login.jpg) | ![Ikhtisar Dashboard](assets/dist/img/preview_dashboard.jpg) |

---

## 👨‍💻 Penulis

**Kyoo** - _Lead Developer_

---

## 🌟 Dukungan & Donasi

Jika Anda menyukai repositori ini dan merasa terbantu, jangan lupa untuk memberikan **Star**! ⭐

Jika Anda ingin mendukung pengembangan lebih lanjut atau memberikan donasi, Anda dapat menghubungi saya melalui WhatsApp:
👉 [**Hubungi via WhatsApp (087780081554)**](https://wa.me/6287780081554)

---

> Dikembangkan dengan ❤️ untuk Industri Laundry Indonesia.

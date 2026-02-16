# 🧩 DAFTAR MODUL APLIKASI LAUNDRY

## 1. 🔐 Modul Auth & User Management

Fungsi:

- Login / logout
- Manajemen user
- Manajemen role & permission

Menu:

- Data user
- Role & hak akses

---

## 2. 👥 Modul Data Pelanggan

Fungsi:

- CRUD pelanggan
- Poin / member (opsional)
- Riwayat transaksi pelanggan

Field penting:

- Nama
- No HP (untuk WA notifikasi)
- Alamat

---

## 3. 🧺 Modul Layanan Laundry

Fungsi:

- Master jenis layanan

Contoh:

- Cuci kering
- Cuci setrika
- Setrika saja
- Express

Field:

- Nama layanan
- Harga per kg / pcs
- Estimasi waktu pengerjaan (default)

---

## 4. 📦 Modul Transaksi Order

Fungsi utama operasional:

- Input order
- Pilih pelanggan
- Pilih layanan
- Berat / qty
- Tanggal masuk
- Estimasi selesai
- Status order

Status:

- Diterima
- Diproses
- Selesai
- Diambil

Auto:

- Hitung total
- Generate kode invoice

---

## 5. ⏱️ Modul Estimasi Pengerjaan

Bisa:

- Ambil dari master layanan
- Bisa diubah saat transaksi

Output:

- Tanggal selesai
- Lama proses (misal: 2 hari)

---

## 6. 💬 Modul WA Gateway Notifikasi

Trigger otomatis saat:

- Order dibuat → “Pesanan diterima”
- Status → Diproses
- Status → Selesai
- Status → Diambil

Isi pesan contoh:

```
Halo Kak 👋
Laundry dengan kode INV-001 sedang diproses.
Estimasi selesai: 17 Feb 2026
Terima kasih 🙏
```

Setting:

- API key WA
- Template pesan

---

## 7. 💰 Modul Pembayaran

Fungsi:

- Status bayar (Lunas / Belum)
- Metode bayar
  - Cash
  - Transfer
  - QRIS

---

## 8. 📊 Modul Laporan Transaksi

Filter:

- Harian
- Bulanan
- Tahunan
- Per layanan

Output:

- Total transaksi
- Total pendapatan

---

## 9. 📉 Modul Laba Rugi

Data dari:
✔ pemasukan → transaksi
✔ pengeluaran → modul pengeluaran

Hasil:

- Total pendapatan
- Total biaya
- Laba bersih

---

## 10. 🧾 Modul Pengeluaran

Fungsi:

- Input biaya operasional

Contoh:

- Beli deterjen
- Gaji karyawan
- Listrik
- Air
- Plastik

Field:

- Tanggal
- Kategori
- Nominal
- Keterangan

---

## 11. 📦 Modul Dashboard

Menampilkan:

- Order masuk hari ini
- Order selesai hari ini
- Pendapatan hari ini
- Grafik bulanan
- Order proses

---

# 👤 ROLE & HAK AKSES

## 1. SUPER ADMIN / OWNER

Akses:
✅ Semua modul
✅ Laporan laba rugi
✅ Setting WA gateway
✅ Manajemen user

---

## 2. ADMIN / KASIR

Akses:
✅ Input pelanggan
✅ Input order
✅ Update status laundry
✅ Pembayaran
✅ Lihat laporan transaksi

❌ Tidak bisa lihat laba rugi
❌ Tidak bisa setting sistem

---

## 3. OPERATOR PRODUKSI

Akses:
✅ Lihat daftar order
✅ Update status:

- Diproses
- Selesai

❌ Tidak bisa lihat keuangan
❌ Tidak bisa edit harga

---

## 4. OWNER (VIEW ONLY – OPSIONAL)

Kalau dipisah dari super admin:

Akses:
✅ Dashboard
✅ Laporan

- Transaksi
- Laba rugi

❌ Tidak bisa input data

---

# ⚙️ MODUL TAMBAHAN (NILAI PLUS UNTUK SKRIPSI / PRODUK)

Ini bikin sistem terlihat **lebih advance**:

### ⭐ Membership / pelanggan langganan

### ⭐ Paket laundry

### ⭐ Diskon & promo

### ⭐ Multi cabang

### ⭐ Cetak nota thermal

### ⭐ QR code invoice

### ⭐ Pickup & delivery

### ⭐ Stok bahan (deterjen, pewangi)

---

# 🧱 STRUKTUR MENU (SIAP IMPLEMENTASI CI3)

Contoh sidebar:

```
Dashboard

Master
- Pelanggan
- Layanan
- User

Transaksi
- Order Laundry
- Pembayaran

Operasional
- Status Produksi

Keuangan
- Pengeluaran
- Laporan Transaksi
- Laba Rugi

Notifikasi
- WA Gateway
- Template Pesan

Setting
```

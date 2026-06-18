<div align="center">

# 🚀 RESTful API: Employee Management

<img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExNHJ4ZzBqN3J4ZzBqN3J4ZzBqN3J4ZzBqN3J4ZzBqN3J4ZzBqJmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCZjdD1n/l41lTjJp9pYy33tqM/giphy.gif" width="100%" />

### RESTful API Native PHP dengan Database MySQL

[![PHP](https://img.shields.io/badge/PHP-7.x%2B-blue?logo=php)]() 
[![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)]() 
[![Postman](https://img.shields.io/badge/Postman-Testing-yellow?logo=postman)]()

---

## 📖 Tentang Proyek
Proyek ini adalah implementasi **RESTful API** menggunakan PHP native dan MySQL untuk manajemen data karyawan. Proyek ini dirancang untuk mendukung operasi CRUD (Create, Read, Update, Delete) dengan *Pretty URL* melalui konfigurasi `.htaccess`.

---

## 🛠 Tech Stack
<p align="center">
  <img src="https://skillicons.dev/icons?i=php,mysql,postman,apache" />
</p>

---

## ⚙️ Fitur API
Aplikasi ini mendukung metode HTTP standar untuk komunikasi data:
* **GET**: Mengambil seluruh data karyawan atau detail karyawan berdasarkan ID.
* **POST**: Menambahkan data karyawan baru ke database.
* **PUT**: Melakukan update data karyawan berdasarkan ID.
* **DELETE**: Menghapus data karyawan dari database.

---

## 🚀 Cara Pengujian
Untuk menguji API ini, gunakan **Postman**:
1. Pastikan server lokal Anda aktif.
2. Gunakan format **Raw JSON** saat melakukan `POST` atau `PUT`.
3. Contoh format JSON yang digunakan:
```json
{
    "nama": "Andi",
    "email": "andi@gmail.com",
    "divisi": "IT",
    "gaji": 5000000
}

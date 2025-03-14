Membuat **Website Pelayanan Disdukcapil**, berikut adalah **hirarki struktur beserta fungsinya** agar lebih jelas dalam pengembangannya.  
### **1️⃣ Level 1: Halaman Utama**
📌 **Fungsi:**  
- Menampilkan **berita terbaru** dan pengumuman dari Disdukcapil.  
- Menyediakan **navigasi** ke layanan yang tersedia.  
- Memberikan kontak untuk bantuan pelanggan.  
 
---

### **2️⃣ Level 2: Layanan Utama**
📌 **Fungsi:**  
Menampilkan **formulir pendaftaran** untuk layanan kependudukan, seperti:  
1. **Pendaftaran e-KTP** (`daftar_ktp`)  
2. **Pendaftaran Kartu Keluarga (KK)** (`daftar_kk`)  
3. **Pendaftaran Akta Kelahiran** (`daftar_akta`)  
4. **Cek Status Pengajuan** (`cek_status`)  

---

### **3️⃣ Level 3: Backend (Pemrosesan Data)**
📌 **Fungsi:**  
- Mengelola pengiriman data dari formulir ke **database**.  
- Memberikan **respons balik** ke pengguna setelah pendaftaran.  
- Memungkinkan **admin mengubah status pendaftaran**.  

---

### **4️⃣ Level 4: Dashboard Admin**  
📌 **Fungsi:**  
- **Melihat daftar pengajuan yang masuk.**  
- **Memverifikasi dan memperbarui status permohonan.**  
- **Mengelola pengguna/admin yang memiliki akses.**  

---

## **🎯 Alur Kerja Website:**
1️⃣ **Warga mengakses website**  
2️⃣ **Warga memilih layanan** (e-KTP, KK, Akta) dan mengisi formulir.  
3️⃣ **Data dikirim ke database** 
4️⃣ **Warga bisa mengecek status** 
5️⃣ **Admin login** ke dashboard
6️⃣ **Admin memverifikasi data dan mengubah status** 
7️⃣ **Warga bisa melihat status terbaru** setelah diperbarui oleh admin.  

---

## **📌 Fitur Tambahan yang Bisa Ditambahkan**
✅ **Login & Registrasi Pengguna** → Agar warga bisa melihat riwayat permohonannya.  
✅ **Upload Dokumen** → Warga bisa mengunggah foto KTP lama untuk verifikasi.  
✅ **Email Notifikasi** → Memberitahu warga ketika status permohonan berubah.  
✅ **Export Data** → Admin bisa mengunduh daftar pengajuan dalam format Excel.  

---

## **📝 Kesimpulan**
Dengan hirarki ini, kamu bisa **membangun website secara bertahap** mulai dari bagian **formulir, backend, hingga dashboard admin**.  
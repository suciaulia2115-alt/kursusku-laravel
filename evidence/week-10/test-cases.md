# TEST MATRIX – KURSUSKU
## Praktikum Pertemuan 10

### A. Tabel Pengujian

| No. | Fitur yang Diuji | Skenario Pengujian | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|
| 1 | Menampilkan Data Kursus | Membuka halaman `/courses` | Sistem menampilkan daftar kursus yang tersimpan di database | Data kursus berhasil ditampilkan | PASS |
| 2 | Menambahkan Data Kursus | Mengisi formulir dengan data kursus yang valid | Sistem menyimpan data kursus ke database | Data kursus berhasil ditambahkan | PASS |
| 3 | Validasi Kode Kosong | Mengosongkan kolom kode kursus | Sistem menampilkan pesan bahwa kode wajib diisi | Pesan validasi berhasil ditampilkan | PASS |
| 4 | Validasi Kode Duplikat | Memasukkan kode kursus yang sudah terdaftar, yaitu WEB-101 | Sistem menolak kode yang sudah digunakan | Sistem menampilkan pesan kode sudah digunakan | PASS |
| 5 | Validasi Biaya Negatif | Memasukkan nilai biaya negatif | Sistem menolak nilai biaya yang tidak valid | Sistem berhasil menolak biaya negatif | PASS |
| 6 | Validasi Kuota Kosong | Mengosongkan kolom kuota | Sistem menampilkan pesan bahwa kuota wajib diisi | Pesan validasi berhasil ditampilkan | PASS |
| 7 | Mengubah Data Kursus | Mengubah informasi kursus melalui tombol Edit | Sistem memperbarui data kursus di database | Data kursus berhasil diperbarui | PASS |
| 8 | Menghapus Data Kursus | Menghapus data kursus melalui tombol Hapus | Sistem menghapus data kursus dari database | Data kursus berhasil dihapus | PASS |

### B. Keterangan

- PASS: Pengujian berhasil dan sesuai dengan hasil yang diharapkan.
- FAIL: Pengujian tidak berhasil atau tidak sesuai dengan hasil yang diharapkan.

### C. Kesimpulan

Berdasarkan hasil pengujian yang telah dilakukan, fitur pengelolaan data kursus pada aplikasi KursusKu telah berjalan dengan baik. Fitur tersebut meliputi menampilkan data kursus, menambahkan data kursus, validasi input, mengubah data kursus, dan menghapus data kursus.

Seluruh skenario pengujian berhasil dilakukan dan memberikan hasil sesuai dengan yang diharapkan. Dengan demikian, implementasi fitur pengelolaan data kursus pada Praktikum Pertemuan 10 telah berhasil diselesaikan.
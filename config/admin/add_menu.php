<?php
include '../koneksi.php'; // Pastikan file koneksi database sudah benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $fotoDatabasePath = ''; // Nilai default untuk foto

    // Proses upload gambar
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../public/admin/'; // Direktori untuk menyimpan file
        $fileName = basename($_FILES['foto']['name']);
        $foto = $uploadDir . $fileName; // Path lengkap untuk menyimpan file
        $fotoDatabasePath = 'public/admin/' . $fileName; // Path relatif untuk disimpan di database

        // Pindahkan file ke direktori tujuan
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
            die('Gagal mengunggah gambar.');
        }
    } else {
        die('File tidak diunggah atau terjadi kesalahan.');
    }

    // Debug untuk memastikan semua data sudah benar
    if (empty($fotoDatabasePath)) {
        die('Path foto kosong. Periksa proses upload.');
    }

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO menu (nama_produk, kategori, foto, harga) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssi", $nama, $kategori, $fotoDatabasePath, $harga);

    if ($stmt->execute()) {
        // Redirect ke halaman menu_admin.php setelah berhasil
        header('Location: ../../modul/admin/menu/menu_admin.php');
        exit;
    } else {
        die('Gagal menambahkan menu: ' . $stmt->error);
    }
}
?>
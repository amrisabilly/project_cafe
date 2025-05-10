<?php
include '../koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $foto = '';

    // Proses upload gambar
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../public/admin'; // Direktori untuk menyimpan file
        $foto = $uploadDir . basename($_FILES['foto']['name']);
        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
            die('Gagal mengunggah gambar.');
        }
    }

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO menu (nama_produk, kategori, foto, harga) VALUES ($nama, $kategori, $foto, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssis", $nama, $kategori, $harga, $foto);

    if ($stmt->execute()) {
        // Redirect ke halaman menu_admin.php setelah berhasil
        header('Location: ../../modul/admin/menu/menu_admin.php');
        exit;
    } else {
        die('Gagal menambahkan menu: ' . $stmt->error);
    }
}
?>
<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_produk = $_POST['id_produk'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $fotoDatabasePath = $_POST['foto_lama'];

    // Proses upload gambar jika ada file baru
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../public/admin/';
        $fileName = basename($_FILES['foto']['name']);
        $foto = $uploadDir . $fileName;
        $fotoDatabasePath = 'public/admin/' . $fileName;

        if (!move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
            die('Gagal mengunggah gambar.');
        }
    }

    // Update data di database
    $query = "UPDATE menu SET nama_produk = ?, kategori = ?, foto = ?, harga = ? WHERE id_produk = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssii", $nama, $kategori, $fotoDatabasePath, $harga, $id_produk);

    if ($stmt->execute()) {
        header('Location: ../../modul/admin/menu/coffee_admin.php?status=success');
        exit;
    } else {
        header('Location: ../../modul/admin/menu/coffee_admin.php?status=error');
    }
}
?>
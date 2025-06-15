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
            header('Location: ../../modul/admin/menu/tambah_menu_admin.php?status=error&message=Gagal mengunggah gambar.');
            exit;
        }
    } else {
        header('Location: ../../modul/admin/menu/tambah_menu_admin.php?status=error&message=File tidak diunggah atau terjadi kesalahan.');
        exit;
    }

    // Debug untuk memastikan semua data sudah benar
    if (empty($fotoDatabasePath)) {
        header('Location: ../../modul/admin/menu/tambah_menu_admin.php?status=error&message=Path foto kosong. Periksa proses upload.');
        exit;
    }

    // Query untuk menambahkan data ke database
    $query = "INSERT INTO menu (nama_produk, kategori, foto, harga) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssi", $nama, $kategori, $fotoDatabasePath, $harga);

    if ($stmt->execute()) {
        // Redirect ke halaman tambah_menu_admin.php dengan status sukses
        header('Location: ../../modul/admin/menu/tambah_menu_admin.php?status=success');
        exit;
    } else {
        // Redirect ke halaman tambah_menu_admin.php dengan status error
        header('Location: ../../modul/admin/menu/tambah_menu_admin.php?status=error&message=' . urlencode('Gagal menambahkan menu: ' . $stmt->error));
        exit;
    }
}
?>
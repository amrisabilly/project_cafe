<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? null;
    $kategori = $_POST['kategori'] ?? null;

    // --- HAPUS PESANAN DARI KERANJANG ---
    if ($action === 'remove_from_cart') {
        $id_produk = $_POST['id_produk'];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id_produk'] == $id_produk) {
                    unset($_SESSION['cart'][$key]);
                }
            }
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
        header('Location: ../../modul/user/menu/pesanan.php?status=success&message=' . urlencode("Pesanan berhasil dihapus!"));
        exit;
    }

    // --- TAMBAH PESANAN KE KERANJANG ---
    if ($action === 'add_to_cart') {
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $catatan = $_POST['catatan'] ?? '';

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id_produk'] === $id_produk) {
                $item['jumlah'] += $jumlah;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = [
                'id_produk' => $id_produk,
                'nama_produk' => $nama_produk,
                'harga' => $harga,
                'jumlah' => $jumlah,
                'catatan' => $catatan,
                'kategori' => $kategori,
            ];
        }
        header("Location: ../../modul/user/menu/{$kategori}.php?status=success&message=" . urlencode("Menu berhasil ditambahkan ke keranjang!"));
        exit;
    }

    // --- CHECKOUT DAN HAPUS KERANJANG ---
    if ($action === 'checkout') {
        $username = $_SESSION['username'] ?? 'Guest';
        $meja = $_SESSION['meja'] ?? 'Unknown';
        $cart = $_SESSION['cart'] ?? [];
        $total_harga = 0;

        if (empty($cart)) {
            header('Location: ../../modul/user/menu/pesanan.php?status=error&message=' . urlencode("Keranjang kosong!"));
            exit;
        }

        // Simpan transaksi utama
        $query = "INSERT INTO transaksi (username, meja, total_harga) VALUES (?, ?, ?)";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("ssd", $username, $meja, $total_harga);
        $stmt->execute();
        $id_transaksi = $stmt->insert_id;

        // Simpan detail transaksi
        foreach ($cart as $item) {
            $id_produk = $item['id_produk'];
            $nama_produk = $item['nama_produk'];
            $jumlah = $item['jumlah'];
            $harga = $item['harga'];
            $catatan = $item['catatan'] ?? '';
            $total_harga_item = $harga * $jumlah;

            $query = "INSERT INTO detail_transaksi (id_transaksi, id_produk, nama_produk, jumlah, harga, total_harga, catatan) 
                      VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("iisidss", $id_transaksi, $id_produk, $nama_produk, $jumlah, $harga, $total_harga_item, $catatan);
            $stmt->execute();

            $total_harga += $total_harga_item;
        }

        // Update total harga di transaksi utama
        $query = "UPDATE transaksi SET total_harga = ? WHERE id_transaksi = ?";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("di", $total_harga, $id_transaksi);
        $stmt->execute();

        // HAPUS KERANJANG SETELAH CHECKOUT
        unset($_SESSION['cart']);

        header('Location: ../../modul/user/bayar/pembayaran.php');
        exit;
    }
}
?>
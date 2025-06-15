<?php
session_start();
include '../../../config/koneksi.php';

// Ambil data dari session
$cart = $_SESSION['cart'] ?? [];
$total_harga = 0;

// Jika cart tidak kosong, ambil foto dari database untuk setiap item
if (!empty($cart)) {
    foreach ($cart as $key => $item) {
        // Jika foto belum ada di cart, ambil dari database
        if (empty($item['foto'])) {
            $query = "SELECT foto FROM menu WHERE id_produk = ?";
            $stmt = $koneksi->prepare($query);
            $stmt->bind_param("i", $item['id_produk']);
            $stmt->execute();
            $result = $stmt->get_result();
            $menu = $result->fetch_assoc();

            // Tambahkan foto ke item cart
            $cart[$key]['foto'] = $menu['foto'] ?? 'public/default.png';
        }

        // Hitung total harga
        $total_harga += $item['harga'] * $item['jumlah'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Pupaq Nine</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <section class="mb-5">
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 2em;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">PESANAN</h1>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php if (!empty($cart)): ?>
                <?php foreach ($cart as $item): ?>
                    <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="background-color: transparent;width: 100%;height: 5em;border: 1px solid #000000">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <img src="../../../<?php echo $item['foto']; ?>" alt="Foto Menu" class="rounded-3" style="width: 38px;height: 38px;">
                            <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                                <h3 class="fw-bold" style="font-size: 12px;"><?php echo $item['nama_produk']; ?></h3>
                                <p style="font-size: 12px;"><?php echo $item['jumlah']; ?><span>x</span></p>
                            </div>
                        </div>
                        <div style="width: 9em;font-size: 12px;height: 100%;margin-top: 2.5em;">
                            <p>Rp. <span><?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?></span></p>
                        </div>
                        <form action="../../../config/user/menu_controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="action" value="remove_from_cart">
                            <input type="hidden" name="id_produk" value="<?php echo $item['id_produk']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus pesanan ini?')">Hapus</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Belum ada pesanan.</p>
            <?php endif; ?>
            

            <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="border: none; background-color: #EAABAB; width: 100%; height: 5em;">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <h5>Total :</h5>
                </div>
                <div class="d-flex align-items-center justify-content-end" style="width: 15em; font-size: 12px; height: 80%;">
                    <p class="fw-bold text-end" style="font-size: 14px; margin: 0;">Rp. <span><?php echo number_format($total_harga, 0, ',', '.'); ?></span></p>
                </div>
            </div>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="index.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
        <form action="../../../config/user/menu_controller.php" method="post" style="margin: 0;">
            <input type="hidden" name="action" value="checkout">
            <button type="submit" class="fw-bold text-black" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
                Bayar
            </button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
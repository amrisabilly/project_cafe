<?php
session_start();
include '../../../config/koneksi.php';

// Ambil data transaksi berdasarkan username dan meja
$username = $_SESSION['username'] ?? null;
$meja = $_SESSION['meja'] ?? null;

if ($username && $meja) {
    $query = "SELECT * FROM transaksi WHERE username = ? AND meja = ? ORDER BY waktu DESC LIMIT 1";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("ss", $username, $meja);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaksi = $result->fetch_assoc();


    if ($transaksi) {
        // Ambil detail transaksi
        $query = "
            SELECT dt.*, p.foto 
            FROM detail_transaksi dt
            JOIN menu p ON dt.id_produk = p.id_produk
            WHERE dt.id_transaksi = ?
        ";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $transaksi['id_transaksi']);
        $stmt->execute();
        $details = $stmt->get_result();
    } else {
        $details = null;
    }
} else {
    $transaksi = null;
    $details = null;
}

if ($transaksi && $transaksi['status'] === 'Selesai') {
    unset($_SESSION['cart']);
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
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">PEMBAYARAN</h1>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php if ($transaksi): ?>
                <!-- Total Harga -->
                <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="border: none; background-color: #EAABAB; width: 100%; height: 5em;">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <h5>Total :</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end" style="width: 15em; font-size: 12px; height: 80%;">
                        <p class="fw-bold text-end" style="font-size: 14px; margin: 0;">Rp. <span><?php echo number_format($transaksi['total_harga'], 0, ',', '.'); ?></span></p>
                    </div>
                </div>

                <!-- Pilih Metode Pembayaran -->
                <div style="width: 100%;">
                    <h6>Pilih Metode Pembayaran</h6>
                </div>

                <!-- Metode Pembayaran -->
                <form action="detail_pembayaran.php" method="post" style="margin: 0;width: 100%;height: 100%;display:flex; flex-direction: column;align-items: center; gap: 0.5em;">
                    <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi']; ?>">

                    <div class="rounded-1 shadow d-flex align-items-center px-2" style="background-color: transparent;width: 100%;height: 5em;border: 1px solid #000000">
                        <div class="d-flex align-items-center gap-3" style="width: 100%;">
                            <img src="../../../public/user/Money.png" alt="" class="rounded-3" style="width: 38px;height: 38px;">
                            <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                                <h3 class="fw-bold" style="font-size: 12px;">Tunai</h3>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <input type="radio" name="metode_pembayaran" value="tunai" required>
                        </div>
                    </div>
                    <br>

                    <div class="rounded-1 shadow d-flex align-items-center px-2" style="background-color: transparent;width: 100%;height: 5em;border: 1px solid #000000">
                        <div class="d-flex align-items-center gap-3" style="width: 100%;">
                            <img src="../../../public/user/qriz.png" alt="" class="rounded-3" style="width: 38px;height: 38px;">
                            <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                                <h3 class="fw-bold" style="font-size: 12px;">QRIS</h3>
                            </div>
                        </div>
                        <div class="ms-auto">
                            <input type="radio" name="metode_pembayaran" value="qris" required>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-center">Tidak ada transaksi yang ditemukan.</p>
                <?php endif; ?>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="../menu/pesanan.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
        <?php if ($transaksi): ?>
            <input type="hidden" name="id_transaksi" value="<?php echo $transaksi['id_transaksi']; ?>">
            <button type="submit" class="fw-bold text-black" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
                Bayar
            </button>
        <?php endif; ?>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
<?php
session_start();
include '../../../config/koneksi.php';

// Ambil data dari form atau session
$id_transaksi = $_GET['id_transaksi'] ?? null;

if ($id_transaksi) {
    // Ambil data transaksi
    $query = "SELECT * FROM transaksi WHERE id_transaksi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_transaksi);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaksi = $result->fetch_assoc();

    if ($transaksi) {
        // Ambil detail transaksi
        $query = "
            SELECT dt.*, p.nama_produk, (dt.jumlah * dt.harga) AS subtotal
            FROM detail_transaksi dt
            JOIN menu p ON dt.id_produk = p.id_produk
            WHERE dt.id_transaksi = ?
        ";
        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("i", $id_transaksi);
        $stmt->execute();
        $details = $stmt->get_result();
    } else {
        $details = null;
    }
} else {
    $transaksi = null;
    $details = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <section class="mb-5">
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 3em;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">STRUK PEMBAYARAN</h1>
        </div>

        <div class="d-flex flex-column align-items-center px-3 gap-3" style="height: auto; width: 100%;">
            <div class="rounded-1 shadow px-3 py-3" style="background-color: #ffffff; width: 100%; border: 1px solid #000000; font-size: 14px; font-family: 'Courier New', Courier, monospace;">
                <!-- Header Struk -->
                <div class="text-center">
                    <p style="margin: 0;">------------------------------------</p>
                    <p style="margin: 0;"><?php echo date('d - m - Y', strtotime($transaksi['tanggal'] ?? '')); ?></p>
                    <p style="margin: 0;"><?php echo date('H:i:s', strtotime($transaksi['waktu'] ?? '')); ?></p>
                    <p style="margin: 0;"><?php echo ucfirst($transaksi['username'] ?? ''); ?></p>
                    <p style="margin: 0;">Meja No. <?php echo $transaksi['meja'] ?? ''; ?></p>
                    <p style="margin: 0;">------------------------------------</p>
                </div>

                <!-- Daftar Pesanan -->
                <div>
                    <?php if ($details): ?>
                        <?php while ($row = $details->fetch_assoc()): ?>
                            <p style="margin: 0;"><?php echo $row['nama_produk']; ?></p>
                            <p style="margin: 0;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['jumlah']; ?> x Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?><span style="float: right;">Rp<?php echo number_format($row['subtotal'], 0, ',', '.'); ?></span></p>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p style="margin: 0;">Tidak ada pesanan.</p>
                    <?php endif; ?>
                </div>

                <!-- Subtotal dan Total -->
                <div>
                    <p style="margin: 0;">------------------------------------</p>
                    <p style="margin: 0;">Sub Total<span style="float: right;">Rp<?php echo number_format($transaksi['total_harga'] ?? 0, 0, ',', '.'); ?></span></p>
                    <p style="margin: 0;">Total<span style="float: right;">Rp<?php echo number_format($transaksi['total_harga'] ?? 0, 0, ',', '.'); ?></span></p>
                    <p style="margin: 0;">Bayar (<?php echo ucfirst($transaksi['status'] ?? ''); ?>)<span style="float: right;">Rp<?php echo number_format($transaksi['total_harga'] ?? 0, 0, ',', '.'); ?></span></p>
                    <p style="margin: 0;">Kembali<span style="float: right;">Rp0,00</span></p>
                    <p style="margin: 0;">------------------------------------</p>
                </div>

                <!-- Footer -->
                <div class="text-center">
                    <p style="margin: 0;">Terimakasih Telah Memesan</p>
                </div>
            </div>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="../menu/index.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
        <a href="status_pesanan.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            Status Pesanan</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
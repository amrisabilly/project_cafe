<?php
session_start();
include '../../../config/koneksi.php';

// Ambil ID transaksi dari URL
$id_transaksi = $_GET['id_transaksi'] ?? null;

if (!$id_transaksi) {
    echo "ID transaksi tidak ditemukan.";
    exit;
}

// Ambil data transaksi utama
$query_transaksi = "SELECT * FROM transaksi WHERE id_transaksi = ?";
$stmt_transaksi = $koneksi->prepare($query_transaksi);
$stmt_transaksi->bind_param("i", $id_transaksi);
$stmt_transaksi->execute();
$result_transaksi = $stmt_transaksi->get_result();
$transaksi = $result_transaksi->fetch_assoc();

if (!$transaksi) {
    echo "Transaksi tidak ditemukan.";
    exit;
}

// Ambil detail transaksi
$query_detail = "SELECT dt.*, m.foto 
                 FROM detail_transaksi dt
                 LEFT JOIN menu m ON dt.id_produk = m.id_produk
                 WHERE dt.id_transaksi = ?";
$stmt_detail = $koneksi->prepare($query_detail);
$stmt_detail->bind_param("i", $id_transaksi);
$stmt_detail->execute();
$result_detail = $stmt_detail->get_result();
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
            <img src="../../../public/admin/Coffee.png" alt="" style="width: 40px;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">Cafe Pupaq Nine</h1>
        </div>

        <!-- Informasi Transaksi -->
        <div class="px-3" style="width: 100%;height: 2em;margin-bottom: 1em;margin-bottom: 3em;">
            <div class="shadow d-flex justify-content-between align-items-center px-3" style="background-color: transparent;border: 1px solid #000000;border-radius: 7px;">
                <p class="fw-bold mt-1" style="font-size: 15px;">Nama: <?php echo htmlspecialchars($transaksi['username']); ?></p>
                <p class="fw-bold mt-1" style="font-size: 15px;">Meja: <?php echo htmlspecialchars($transaksi['meja']); ?></p>
            </div>
        </div>

        <!-- Detail Pesanan -->
        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php if ($result_detail->num_rows > 0): ?>
                <?php while ($row = $result_detail->fetch_assoc()): ?>
                    <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="background-color: transparent;width: 100%;height: 5em;border: 1px solid #000000">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <img src="../../../<?php echo $row['foto'] ?? 'public/default.png'; ?>" alt="Foto Menu" class="rounded-3" style="width: 38px;height: 38px;">
                            <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                                <h3 class="fw-bold" style="font-size: 12px;"><?php echo htmlspecialchars($row['nama_produk']); ?></h3>
                                <p style="font-size: 12px;"><?php echo $row['jumlah']; ?><span>x</span></p>
                            </div>
                        </div>
                        <div style="width: 9em;font-size: 12px;height: 100%;margin-top: 2.5em;">
                            <p>Rp. <span><?php echo number_format($row['harga'] * $row['jumlah'], 0, ',', '.'); ?></span></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada detail pesanan.</p>
            <?php endif; ?>
        </div>
    </section>

    <!-- Tombol Kembali -->
    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="pesanan_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
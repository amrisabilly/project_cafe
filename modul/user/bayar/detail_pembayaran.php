<?php
session_start();
include '../../../config/koneksi.php';

// Ambil data dari form
$id_transaksi = $_POST['id_transaksi'] ?? null;
$metode_pembayaran = $_POST['metode_pembayaran'] ?? null;

if ($id_transaksi) {
    // Ambil data transaksi
    $query = "SELECT * FROM transaksi WHERE id_transaksi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_transaksi);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaksi = $result->fetch_assoc();

    if ($transaksi) {
        // Ambil detail transaksi dengan perhitungan subtotal
        $query = "
            SELECT dt.*, p.foto, p.nama_produk, (dt.jumlah * dt.harga) AS subtotal
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
    <title>Cafe Pupaq Nine</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* Tambahkan padding bawah untuk kontainer utama */
        .content-container {
            padding-bottom: 6em;
            /* Ruang untuk tombol */
        }

        /* Tombol konfirmasi tetap di bawah */
        .sticky-footer {
            position: sticky;
            bottom: 0;
            background-color: #73F1A7;
            width: 100%;
            padding: 0.7em;
            z-index: 10;
        }
    </style>
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <div>
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9; width: 100%; height: 5em; margin-top: 3em; margin-bottom: 3em;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">PEMBAYARAN</h1>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php if ($details): ?>
                <?php while ($row = $details->fetch_assoc()): ?>
                    <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="background-color: transparent; width: 100%; height: 5em; border: 1px solid #000000;">
                        <div class="d-flex justify-content-between align-items-center gap-3">
                            <img src="../../../<?php echo $row['foto']; ?>" alt="" class="rounded-3" style="width: 38px; height: 38px;">
                            <div class="d-flex flex-column justify-content-center" style="padding-top: 12px;">
                                <h3 class="fw-bold" style="font-size: 12px;"><?php echo $row['nama_produk']; ?></h3>
                                <p style="font-size: 12px;"><?php echo $row['jumlah']; ?><span>x</span></p>
                            </div>
                        </div>
                        <div style="width: 9em; font-size: 12px; height: 100%; margin-top: 2.5em;">
                            <p>Rp. <span>
                                    <?php
                                    echo isset($row['subtotal']) && $row['subtotal'] !== null
                                        ? number_format($row['subtotal'], 0, ',', '.')
                                        : '0';
                                    ?>
                                </span></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada detail transaksi yang ditemukan.</p>
            <?php endif; ?>



            <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="border: none; background-color: #EAABAB; width: 100%; height: 5em;">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <h5>Total :</h5>
                </div>
                <div class="d-flex align-items-center justify-content-end" style="width: 15em; font-size: 12px; height: 80%;">
                    <p class="fw-bold text-end" style="font-size: 14px; margin: 0;">Rp. <span><?php echo isset($transaksi['total_harga']) ? number_format($transaksi['total_harga'], 0, ',', '.') : '0'; ?></span></p>
                </div>
            </div>

            <div style="width: 100%;">
                <h6>Metode Pembayaran</h6>
            </div>

            <div class="rounded-1 shadow d-flex justify-content-between align-items-center px-2" style="background-color: transparent; width: 100%; height: 5em; border: 1px solid #000000;">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <img src="../../../public/user/<?php echo $metode_pembayaran === 'tunai' ? 'Money.png' : 'qriz.png'; ?>" alt="" class="rounded-3" style="width: 38px; height: 38px;">
                    <div class="d-flex flex-column justify-content-center" style="padding-top: 10px;">
                        <h3 class="fw-bold" style="font-size: 12px;"><?php echo ucfirst($metode_pembayaran); ?></h3>
                    </div>
                </div>
            </div>
            <br>

            <div class="sticky-footer">
                <a href="konfirmasi_pembayaran_sukses.php?id_transaksi=<?php echo $id_transaksi; ?>" class="d-flex rounded-1 justify-content-center align-items-center gap-4 text-black shadow" style="text-decoration: none;">
                    <p class="mb-0 text-center" style="font-size: 16px;">Konfirmasi Pembayaran</p>
                </a>
            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
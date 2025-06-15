<?php
session_start();
include '../../../config/koneksi.php';

// Periksa apakah ada parameter id_transaksi dan status
$id_transaksi = $_GET['id_transaksi'] ?? null;
$status = $_GET['status'] ?? null;

if ($id_transaksi && $status === 'selesai') {
    // Perbarui status pesanan menjadi 'Selesai'
    $query = "UPDATE transaksi SET status = 'Selesai' WHERE id_transaksi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_transaksi);
    $stmt->execute();
}

// Ambil data transaksi dari database
$query = "SELECT * FROM transaksi ORDER BY waktu DESC";
$result = mysqli_query($koneksi, $query);
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
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 3em;">
            <img src="../../../public/admin/Coffee.png" alt="" style="width: 40px;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">Cafe Pupaq Nine</h1>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="rounded-4 d-flex justify-content-between align-items-center px-4" style="background-color: #D9D9D9;width: 100%;height: 7em;border: 1px solid black">
                        <div class="d-flex flex-column justify-content-center pt-1" style="font-size: 12px;height: 100%;">
                            <p class="fw-bold">Nama : <span><?php echo htmlspecialchars($row['username']); ?></span></p>
                            <p class="fw-bold">Meja : <span><?php echo htmlspecialchars($row['meja']); ?></span></p>
                            <a href="detail_pesanan_admin.php?id_transaksi=<?php echo $row['id_transaksi']; ?>" style="text-decoration: none;">Lihat Detail Pesanan</a>
                        </div>
                        <div style="display: flex;align-items: end;flex-direction: column;gap: 1em;">
                            <?php if ($row['status'] === 'Selesai'): ?>
                                <button class="p-2 rounded-4 shadow" style="border: none; background-color: #73C875;font-size: 13px;" disabled>Pesanan Selesai</button>
                            <?php else: ?>
                                <a href="status_pesanan_admin.php?id_transaksi=<?php echo $row['id_transaksi']; ?>" style="text-decoration: none;">
                                    <button class="p-2 rounded-4" style="border: none; background-color: #73C875;font-size: 13px;">
                                        Status Pesanan
                                    </button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center">Tidak ada transaksi.</p>
            <?php endif; ?>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="../menu/menu_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
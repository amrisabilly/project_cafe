<?php
session_start();
include '../../../config/koneksi.php';

// Periksa apakah id_transaksi tersedia di URL
$id_transaksi = $_GET['id_transaksi'] ?? null;

if ($id_transaksi) {
    // Perbarui status pesanan menjadi 'Diantar'
    $query = "UPDATE transaksi SET status = 'Diantar' WHERE id_transaksi = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id_transaksi);
    $stmt->execute();

    // Ambil informasi pesanan
    $query_info = "SELECT username, meja FROM transaksi WHERE id_transaksi = ?";
    $stmt_info = $koneksi->prepare($query_info);
    $stmt_info->bind_param("i", $id_transaksi);
    $stmt_info->execute();
    $result_info = $stmt_info->get_result();
    $pesanan = $result_info->fetch_assoc();
} else {
    echo "ID transaksi tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Pupaq Nine</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">

    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <div>
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;">
            <img src="../../../../public/admin/Coffee.png" alt="" style="width: 40px;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">Cafe Pupaq Nine</h1>
        </div>

        <div class="d-flex justify-content-center align-items-center" style="margin-top: 7em;font-size: 17px;">
            <div class="kartu rounded-4 p-3 d-flex flex-column justify-content-evenly align-items-center" style="width: 18rem;height: 20rem;border:#000000 3px solid;">

                <h1 class="text-center fw-bold">NAMA</h1>
                <div class="rounded-4 p-2 text-center" style="border: black 3px solid;width: 100%;margin-bottom: 2em;">
                    <?php echo htmlspecialchars($pesanan['username']); ?>
                </div>

                <h1 class="text-center fw-bold">MEJA</h1>
                <div class="rounded-4 p-2 text-center" style="border: black 3px solid;width: 100%;">
                    <?php echo htmlspecialchars($pesanan['meja']); ?>
                </div>

                <a href="pesanan_admin.php?id_transaksi=<?php echo $id_transaksi; ?>&status=selesai" class="d-flex justify-content-center align-items-center" style="width: 100%;text-decoration: none;">
                    <button type="button" class="btn fw-bold text-white mt-3 rounded-4" style="background-color: #15FB3B;width: 50%;border: black 3px solid">
                        Selesai
                    </button>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
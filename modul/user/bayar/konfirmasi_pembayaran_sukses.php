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
    <div>
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">KONFIRMASI PEMBAYARAN</h1>
        </div>

        <div class="px-4">
            <div class="d-flex rounded-1 flex-column justify-content-center align-items-center gap-4" style="margin-top: 6em;font-size: 14px;">
                <img src="../../../public/user/Group 156.png" alt="sukses" style="width: 15em;height: 15em;">
                <div style="width: 100%;">
                    <h6 class="text-center fw-bold">Thank You!<br>Your Order is Confirmed</h6>
                </div>
                <!-- Tambahkan id_transaksi ke URL -->
                <a href="struk_pembayaran.php?id_transaksi=<?php echo $_GET['id_transaksi'] ?? ''; ?>" style="width: 100%;text-decoration: none;">
                    <button class="d-flex justify-content-center align-items-center gap-4 shadow" style="background-color: #73B66F;width: 100%;border: none;">
                        <p class="fw-bold" style="font-size: 17px;margin-top:12px;">CETAK STRUK PEMBAYARAN</p>
                    </button>
                </a>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
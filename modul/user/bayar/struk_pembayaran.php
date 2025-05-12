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
        #bankSelect {
            width: 100%;
            padding: 5px;
            border: none;
            border-bottom: 2px solid #000;
            font-size: 13px;
            margin-top: 5px;
            background-color: transparent;
            outline: none;
            /* Hilangkan outline default */
            transition: border-color 0.3s ease;
            /* Animasi transisi */
        }

        #bankSelect:focus {
            border-bottom: 2px solid #AF5C5C;
        }
    </style>

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
            <p style="margin: 0;">11 - 11 - 2024</p>
            <p style="margin: 0;">09:01:34</p>
            <p style="margin: 0;">Aidil</p>
            <p style="margin: 0;">Meja No. 16</p>
            <p style="margin: 0;">------------------------------------</p>
        </div>

        <!-- Daftar Pesanan -->
        <div>
            <p style="margin: 0;">Nasi Ayam Geprek</p>
            <p style="margin: 0;">&nbsp;&nbsp;&nbsp;&nbsp;1 x Rp18.000,00<span style="float: right;">Rp18.000,00</span></p>

            <p style="margin: 0;">Garlic Bread</p>
            <p style="margin: 0;">&nbsp;&nbsp;&nbsp;&nbsp;2 x Rp12.000,00<span style="float: right;">Rp24.000,00</span></p>

            <p style="margin: 0;">Thai Tea</p>
            <p style="margin: 0;">&nbsp;&nbsp;&nbsp;&nbsp;2 x Rp15.000,00<span style="float: right;">Rp30.000,00</span></p>

            <p style="margin: 0;">Cappuccino</p>
            <p style="margin: 0;">&nbsp;&nbsp;&nbsp;&nbsp;1 x Rp15.000,00<span style="float: right;">Rp15.000,00</span></p>
        </div>

        <!-- Subtotal dan Total -->
        <div>
            <p style="margin: 0;">------------------------------------</p>
            <p style="margin: 0;">Sub Total<span style="float: right;">Rp87.000,00</span></p>
            <p style="margin: 0;">Total<span style="float: right;">Rp87.000,00</span></p>
            <p style="margin: 0;">Bayar (E-Wallet ~ Gopay)<span style="float: right;">Rp87.000,00</span></p>
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
        <a href="pesanan_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
        <a href="status_pesanan.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <!-- <img src="../../../public/admin/kembali.png" alt="kembali"> -->
            Status Pesanan</a>
    </div>


    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
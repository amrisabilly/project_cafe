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
        /* Tambahkan padding bawah untuk menghindari tumpang tindih */
        .content-container {
            padding-bottom: 5em;
        }

        /* Pastikan tombol tetap di bagian bawah */
        .fixed-button {
            position: fixed;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 88%;
            padding: 0.7em;
            background-color: #73F1A7;
            text-decoration: none;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            color: black;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <div>
        <div class="d-flex justify-content-center align-items-center gap-3" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;">
            <img src="../../../public/admin/Coffee.png" alt="" style="width: 40px;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">Cafe Pupaq Nine</h1>
        </div>

        <div class="px-4 content-container">
            <div class="d-flex rounded-1 flex-column justify-content-center align-items-center gap-5" style="margin-top: 9em;font-size: 14px;">
                <!-- Status: Menunggu -->
                <div class="d-flex justify-content-center align-items-center gap-4 shadow" style="background-color: red;width: 100%;display: flex;align-items: center;justify-content: center;">
                    <img src="../../../public/admin/Clock.png" alt="clock" style="width: 50px;height: 50px;">
                    <div class="d-flex flex-column mt-3">
                        <p class="fw-bold">Menunggu Antrean</p>
                        <div class="d-flex gap-2">
                            <img src="../../../public/admin/Alarm 5.png" style="width: 20px;height: 20px;" alt="">
                            <p>Pesanan masuk pukul</p>
                        </div>
                    </div>
                </div>

                <!-- Status: Siap -->
                <div class="d-flex rounded-1 justify-content-center align-items-center gap-4 shadow" style="background-color: #FCC689;width: 100%;">
                    <img src="../../../public/admin/Group 50.png" alt="clock" style="width: 50px;height: 50px;">
                    <div class="d-flex flex-column mt-3">
                        <p class="fw-bold">Pesanan Siap</p>
                        <div class="d-flex gap-2">
                            <img src="../../../public/admin/Alarm 5.png" style="width: 20px;height: 20px;" alt="">
                            <p>Pesanan siap pukul </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Pesanan Sudah Siap -->
        <a href="../login/index.php" class="fixed-button">
            Selesai
        </a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
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
            <img src="../../../public/admin/Coffee.png" alt="" style="width: 40px;">
            <h1 class="fw-bold text-center pt-1" style="font-size: 20px;">Cafe Pupaq Nine</h1>
        </div>

        <div class="px-4">
            <div class="d-flex rounded-1 flex-column justify-content-center align-items-center gap-5" style="margin-top: 9em;font-size: 14px;">
                <div class="d-flex justify-content-center align-items-center gap-4 shadow" style="background-color: red;width: 100%;">
                    <img src="../../../public/admin/Clock.png" alt="clock" style="width: 50px;height: 50px;">
                    <div class="d-flex flex-column mt-3">
                        <p class="fw-bold">Menunggu Antrean</p>
                        <div class="d-flex gap-2">
                            <img src="../../../public/admin/Alarm 5.png" style="width: 20px;height: 20px;" alt="">
                            <p>Pesanan masuk pukul 19.20</p>
                        </div>
                    </div>
                </div>

                <div class="d-flex rounded-1 justify-content-center align-items-center gap-4 shadow" style="background-color: #FCC689;width: 100%;">
                    <img src="../../../public/admin/Group 50.png" alt="clock" style="width: 50px;height: 50px;">
                    <div class="d-flex flex-column mt-3">
                        <p class="fw-bold">Menunggu Antrean</p>
                        <div class="d-flex gap-2">
                            <img src="../../../public/admin/Alarm 5.png" style="width: 20px;height: 20px;" alt="">
                            <p>Pesanan masuk pukul 19.20</p>
                        </div>
                    </div>
                </div>
            </div>

            <a href="status_pesanan_siap.php" class="d-flex rounded-1 justify-content-center align-items-center gap-4 text-black shadow" style="background-color: #73F1A7; width: 88%; position: fixed; bottom: 10px; padding: 0.7em;text-decoration: none;">
                <p class="mb-0 text-center" style="font-size: 16px;">Pesanan Sudah Siap</p>
            </a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
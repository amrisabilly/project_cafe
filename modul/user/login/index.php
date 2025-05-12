
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

        <div class="d-flex justify-content-center align-items-center" style="margin-top: 7em;">
            <form action="../../../config/user/login_controller.php" method="post">
                <div class="rounded-5 p-3 d-flex flex-column justify-content-evenly align-items-center" style="width: 18rem;height: 20rem;border:#000000 3px solid;">
                    <h1 class="text-center fw-bold" style="font-size: 16px;">NAMA</h1>
                    <input type="text" name="username" class="form-control rounded-4" id="exampleFormControlInput1" style="border: black 2px solid" placeholder="Kamal" required>
    
                    <h1 class="text-center fw-bold" style="font-size: 16px;margin-top: 1em;">NO. MEJA</h1>
                    <input type="text" name="meja" class="form-control rounded-4" id="exampleFormControlInput1" style="border: black 2px solid" placeholder="12" required>
    
                    <button type="submit" class="btn text-white mt-3 rounded-4" style="background-color: #15FB3B;width: 50%;border: black 2px solid">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
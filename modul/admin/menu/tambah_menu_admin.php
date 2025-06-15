<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika sesi tidak ada
    header("Location: ../login/login.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <style>
        .form input:focus,
        .form select:focus {
            outline: none;
            border: 2px solid #AF5C5C;
            box-shadow: 0 0 5px #AF5C5C;
        }
    </style>
    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <section class="mb-5">
        <div class="d-flex justify-content-center align-items-center" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 0.5em;">
            <h1 class="fw-bold text-center" style="font-size: 20px;">TAMBAH MENU</h1>
        </div>

        <!-- Pesan Notifikasi -->
        <?php
        if (isset($_GET['status'])) {
            $statusMessage = '';
            $statusClass = '';

            if ($_GET['status'] == 'success') {
                $statusMessage = 'Menu Berhasil Ditambahkan!';
                $statusClass = 'alert-success';
            } elseif ($_GET['status'] == 'error') {
                $statusMessage = isset($_GET['message']) ? urldecode($_GET['message']) : 'Terjadi Kesalahan, Menu Gagal Ditambahkan!';
                $statusClass = 'alert-danger';
            }

            if (!empty($statusMessage)) {
                echo "<div id='statusMessage' class='alert $statusClass text-center' role='alert'>$statusMessage</div>";
            }
        }
        ?>
    </section>

    <!-- Form Add -->
    <form action="../../../config/admin/add_menu.php" method="post" enctype="multipart/form-data">
        <div id="formContainerAdd" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 35em; padding: 2em; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem; font-size: 14px;">
            <div style="background-color: #EAABAB; height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.9em; border-radius: 1.5rem;">

                <!-- Input File -->
                <input name="foto" id="imageInputAdd" type="file" accept="image/*" style="border-radius: 5px; align-self: flex-start; margin-left: 10%; border: none;" />

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Nama Menu</label>
                <input name="nama" placeholder="Nama Menu" style="padding: 5px; width: 80%; border-radius: 5px; border: none;" required />

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Kategori</label>
                <select name="kategori" style="padding: 1px; width: 80%; border-radius: 5px; font-size: 13px; border: none;" required>
                    <option value="Coffee" style="font-size: 10px;">Coffee</option>
                    <option value="Main Course" style="font-size: 10px;">Main Course</option>
                    <option value="Non Coffee" style="font-size: 10px;">Non Coffee</option>
                    <option value="Dessert" style="font-size: 10px;">Appetizer & Dessert</option>
                </select>

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Harga</label>
                <input name="harga" type="number" placeholder="Rp. " style="padding: 5px; width: 80%; border-radius: 5px; border: none;" required />

                <div class="d-flex justify-content-between align-items-center" style="width: 80%; margin-top: 1em;">
                    <a href="menu_admin.php" class="rounded-3 p-1 text-decoration-none" style="background-color: #AF5C5C; color: black; padding: 5px 10px;">Kembali</a>
                    <button type="submit" class="rounded-3 p-1" style="background-color: #AF5C5C;">Tambah</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Sembunyikan pesan notifikasi setelah 3 detik
        setTimeout(() => {
            const statusMessage = document.getElementById('statusMessage');
            if (statusMessage) {
                statusMessage.style.display = 'none';
            }
        }, 3000);
    </script>

    <script>
        // Ambil elemen form add, input file, dan preview gambar
        const formContainerAdd = document.getElementById('formContainerAdd');
        const cancelAddButton = document.getElementById('cancelAddButton');
        const imageInputAdd = document.getElementById('imageInputAdd');
        const imagePreviewAdd = document.getElementById('imagePreviewAdd');

        // Tampilkan form add secara langsung saat halaman dimuat
        window.onload = () => {
            formContainerAdd.style.display = 'block'; // Tampilkan form add
        };

        // Event listener untuk tombol Batal pada form Add
        cancelAddButton.addEventListener('click', () => {
            formContainerAdd.style.display = 'none'; // Sembunyikan form add
            imagePreviewAdd.src = '#'; // Reset preview gambar
            imagePreviewAdd.style.display = 'none'; // Sembunyikan gambar
        });

        // Event listener untuk preview gambar
        imageInputAdd.addEventListener('change', (event) => {
            const file = event.target.files[0]; // Ambil file yang dipilih
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreviewAdd.src = e.target.result; // Set src gambar ke hasil pembacaan file
                    imagePreviewAdd.style.display = 'block'; // Tampilkan gambar
                };
                reader.readAsDataURL(file); // Baca file sebagai URL data
            } else {
                imagePreviewAdd.src = '#'; // Reset preview gambar jika tidak ada file
                imagePreviewAdd.style.display = 'none'; // Sembunyikan gambar
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
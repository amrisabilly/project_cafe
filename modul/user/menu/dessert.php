<?php
session_start();
include '../../../config/koneksi.php';

// Ambil data produk kategori Dessert atau Appetizer dari database
$query = "SELECT * FROM menu WHERE kategori = 'Dessert' OR kategori = 'Appetizer'";
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
            <h1 class="fw-bold text-center" style="font-size: 20px;">Dessert</h1>
        </div>

        <?php
        if (isset($_GET['status'])) {
            $statusMessage = '';
            $statusClass = '';

            if ($_GET['status'] == 'success') {
                $statusMessage = isset($_GET['message']) ? urldecode($_GET['message']) : 'Operasi berhasil!';
                $statusClass = 'alert-success';
            } elseif ($_GET['status'] == 'error') {
                $statusMessage = isset($_GET['message']) ? urldecode($_GET['message']) : 'Terjadi kesalahan!';
                $statusClass = 'alert-danger';
            }

            if (!empty($statusMessage)) {
                echo "<div id='statusMessage' class='alert $statusClass text-center' role='alert'>$statusMessage</div>";
            }
        }
        ?>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="rounded-4 d-flex justify-content-between align-items-center px-4" style="background-color: #D9D9D9;width: 100%;height: 5em;">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <img src="../../../<?php echo $row['foto']; ?>" alt="" class="rounded-3" style="width: 38px;height: 38px;">
                        <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                            <h3 class="fw-bold" style="font-size: 14px;"><?php echo $row['nama_produk']; ?></h3>
                            <p style="font-size: 14px;">Rp <span><?php echo number_format($row['harga'], 0, ',', '.'); ?></span></p>
                        </div>
                    </div>
                    <div>
                        <button class="edit" data-id="<?php echo $row['id_produk']; ?>" data-nama="<?php echo $row['nama_produk']; ?>" data-harga="<?php echo $row['harga']; ?>" data-foto="<?php echo $row['foto']; ?>" style="border: none; background-color: transparent;">
                            <img src="../../../public/user/add_circle.png" alt="" class="rounded-3" style="width: 26px;height: 26px;">
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="index.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
        <a href="pesanan.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            Cek Pesanan</a>
    </div>

    <!-- Form input -->
    <div id="formContainerEdit" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 29em; padding: 2em; display: none; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem; font-size: 14px;">
        <form action="../../../config/user/menu_controller.php" method="post">
            <input type="hidden" name="action" value="add_to_cart">
            <input type="hidden" name="kategori" value="dessert">
            <input type="hidden" id="id_produk" name="id_produk">
            <input type="hidden" id="nama_produk" name="nama_produk">
            <input type="hidden" id="harga" name="harga">

            <div style="background-color: #EAABAB; height: 24em; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.6em; border-radius: 1.5rem;">
                <!-- Preview Gambar -->
                <div class="d-flex justify-content-between align-items-center gap-3" style="align-self: flex-start; margin-left: 10%;">
                    <div style="width: 70px; height: 70px; border-radius: 8px; border: 1px solid #ccc; display: flex; overflow: hidden; background-color: #f8f8f8;">
                        <img id="imagePreviewEdit" src="#" alt="Preview Gambar" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                    </div>
                    <p id="editNamaProduk" class="fw-bold" style="font-size: 15px;margin-top:10px;">Nama Produk</p>
                </div>

                <label class="fw-bold" for="editCatatan" style="align-self: flex-start; margin-left: 10%;">Catatan</label>
                <input id="editCatatan" name="catatan" placeholder="-" style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />

                <label class="fw-bold" for="editJumlah" style="align-self: flex-start; margin-left: 10%;">Jumlah</label>
                <input id="editJumlah" name="jumlah" type="number" placeholder="1" style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />

                <div class="d-flex justify-content-between align-items-center" style="width: 80%; margin-top: 1em;">
                    <button id="cancelEditButton" type="button" class="rounded-3 p-1" style="background-color: #AF5C5C;">Kembali</button>
                    <button id="submitEditButton" type="submit" class="rounded-3 p-1" style="background-color: #AF5C5C;">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Sembunyikan pesan notifikasi setelah 3 detik
        setTimeout(() => {
            const statusMessage = document.getElementById('statusMessage');
            if (statusMessage) {
                statusMessage.style.display = 'none';
            }
        }, 2500);
    </script>
    <script>
        const editButtons = document.querySelectorAll('.edit');
        const formContainerEdit = document.getElementById('formContainerEdit');
        const cancelEditButton = document.getElementById('cancelEditButton');
        const imagePreviewEdit = document.getElementById('imagePreviewEdit');
        const editNamaProduk = document.getElementById('editNamaProduk');
        const editCatatan = document.getElementById('editCatatan');
        const editJumlah = document.getElementById('editJumlah');
        const idProdukInput = document.getElementById('id_produk');
        const namaProdukInput = document.getElementById('nama_produk');
        const hargaInput = document.getElementById('harga');

        // Event listener untuk semua tombol Edit
        editButtons.forEach((editButton) => {
            editButton.addEventListener('click', () => {
                const id = editButton.getAttribute('data-id');
                const nama = editButton.getAttribute('data-nama');
                const harga = editButton.getAttribute('data-harga');
                const foto = editButton.getAttribute('data-foto');

                // Isi form edit
                editNamaProduk.textContent = nama;
                editCatatan.value = '';
                editJumlah.value = 1;
                imagePreviewEdit.src = `../../../${foto}`;
                imagePreviewEdit.style.display = 'block';

                // Isi input hidden
                idProdukInput.value = id;
                namaProdukInput.value = nama;
                hargaInput.value = harga;

                // Tampilkan form edit
                formContainerEdit.style.display = 'block';
            });
        });

        // Event listener untuk tombol Batal
        cancelEditButton.addEventListener('click', () => {
            formContainerEdit.style.display = 'none'; // Sembunyikan form edit
            imagePreviewEdit.src = '#'; // Reset preview gambar
            imagePreviewEdit.style.display = 'none'; // Sembunyikan gambar
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
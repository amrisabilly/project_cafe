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
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
        ?>
            <div class="d-flex justify-center align-items-center p-4" style="width: 100%;">
                <div class="d-flex justify-center align-items-center rounded-3" style="background-color: #B7DBFD;width: 100%;height: 3em;">
                    <h1 class="text-center p-3" style="font-size: 17px;margin: 0;">Produk Berhasil Dirubah!!!</h1>
                </div>
            </div>
        <?php
        } elseif (isset($_GET['status']) && $_GET['status'] == 'deleted') {
        ?>
            <div class="d-flex justify-center align-items-center p-4" style="width: 100%;">
                <div class="d-flex justify-center align-items-center rounded-3" style="background-color: #B7DBFD;width: 100%;height: 3em;">
                    <h1 class="text-center p-3" style="font-size: 17px;margin: 0;">Produk Berhasil Dihapus!!!</h1>
                </div>
            </div>
        <?php
        } elseif (isset($_GET['status']) && $_GET['status'] == 'error') {
            echo '<div class="alert alert-danger text-center" role="alert">Pesanan Gagal Ditambahkan!!!</div>';
        }
        ?>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <?php
            include '../../../config/koneksi.php';
            $query = "SELECT * FROM menu Where kategori = 'Dessert' OR kategori = 'Appetizer' ";
            $result = mysqli_query($koneksi, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id_produk = $row['id_produk'];
                $nama = $row['nama_produk'];
                $harga = $row['harga'];
                $kategori = $row['kategori'];
                $foto = $row['foto'];
            ?>
                <div class="rounded-4 d-flex justify-content-between align-items-center px-4" data-id="<?php echo $id_produk; ?>" data-nama="<?php echo $nama; ?>" data-harga="<?php echo $harga; ?>" data-foto="<?php echo $foto; ?>" style="background-color: #D9D9D9;width: 100%;height: 5em;">
                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <img src="../../../<?php echo $foto; ?>" alt="" class="rounded-3" style="width: 38px;height: 38px;">
                        <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                            <h3 class="fw-bold" style="font-size: 14px;"><?php echo $nama ?></h3>
                            <p style="font-size: 14px;">Rp <span><?php echo $harga; ?></span></p>
                        </div>
                    </div>
                    <div>
                        <button style="border: none; background-color: transparent;">
                            <img src="../../../public/admin/Trash.png" alt="" class="rounded-3" style="width: 26px;height: 29px;">
                        </button>
                        <button class="edit" style="border: none; background-color: transparent;">
                            <img src="../../../public/admin/Edit.png" alt="" class="rounded-3" style="width: 26px;height: 29px;">
                        </button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="menu_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
    </div>

    <!-- Form Edit -->
    <form action="../../../config/admin/controller_menu.php" method="post" enctype="multipart/form-data">
        <input type="hidden" id="action" name="action" value="edit" />
        <input type="hidden" id="id_produk" name="id_produk" value="<?php echo $id_produk ?>" />
        <input type="hidden" id="foto" name="foto_lama" value="<?php echo $foto ?>" />
        <input type="text" name="halaman" id="" value="Dessert" hidden>
        <div id="formContainerEdit" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 35em; padding: 2em; display: none; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem; font-size: 14px;">
            <div style="background-color: #EAABAB; height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.6em; border-radius: 1.5rem;">
                <!-- Preview Gambar -->
                <div style="width: 70px; height: 70px; border-radius: 8px; border: 1px solid #ccc; display: flex; overflow: hidden; background-color: #f8f8f8;align-self: flex-start; margin-left: 10%;">
                    <img id="imagePreviewEdit" src="#" alt="Preview Gambar" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                </div>


                <!-- Input File -->
                <input id="imageInputEdit" name="foto" type="file" accept="image/*" style="border-radius: 5px; align-self: flex-start; margin-left: 10%; border: none; visibility: hidden;" />
                <label for="imageInputEdit" class="text-black" style="cursor: pointer; color: white; background-color: #ffffff; padding: 5px 10px; border-radius: 5px; font-size: 14px;align-self: flex-start; margin-left: 10%;">Pilih Gambar</label>

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Nama Menu</label>
                <input id="editNama" name="nama" placeholder="Nama Menu" style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Kategori</label>
                <select id="editKategori" name="kategori" style="padding: 1px; width: 80%; border-radius: 5px; font-size: 13px; border: none;">
                    <option value="Main Course" <?php echo (isset($kategori) && $kategori == 'Main Course') ? 'selected' : ''; ?>>Main Course</option>
                    <option value="Appetizer" <?php echo (isset($kategori) && $kategori == 'Appetizer') ? 'selected' : ''; ?>>Appetizer</option>
                    <option value="Dessert" <?php echo (isset($kategori) && $kategori == 'Dessert') ? 'selected' : ''; ?>>Dessert</option>
                    <option value="Beverage" <?php echo (isset($kategori) && $kategori == 'Beverage') ? 'selected' : ''; ?>>Beverage</option>
                    <option value="Coffee" <?php echo (isset($kategori) && $kategori == 'Coffee') ? 'selected' : ''; ?>>Coffee</option>
                    <option value="Non Coffee" <?php echo (isset($kategori) && $kategori == 'Non Coffee') ? 'selected' : ''; ?>>Non Coffee</option>
                </select>

                <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Harga</label>
                <input id="editHarga" name="harga" type="number" placeholder="Rp. " style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />

                <div class="d-flex justify-content-between align-items-center" style="width: 80%; margin-top: 1em;">
                    <button id="cancelEditButton" type="button" class="rounded-3 p-1" style="background-color: #AF5C5C;">Kembali</button>
                    <button id="submitEditButton" type="submit" class="rounded-3 p-1" style="background-color: #AF5C5C;">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <script>
    // Ambil elemen tombol edit, form edit, input file, dan preview gambar
    const editButtons = document.querySelectorAll('.edit');
    const formContainerEdit = document.getElementById('formContainerEdit');
    const cancelEditButton = document.getElementById('cancelEditButton');
    const imageInputEdit = document.getElementById('imageInputEdit');
    const imagePreviewEdit = document.getElementById('imagePreviewEdit');
    const editNama = document.getElementById('editNama');
    const editKategori = document.getElementById('editKategori');
    const editHarga = document.getElementById('editHarga');

    // Event listener untuk semua tombol Edit
    editButtons.forEach((editButton) => {
        editButton.addEventListener('click', (event) => {
            const parent = editButton.closest('.d-flex');
            const id = parent.getAttribute('data-id');
            const nama = parent.getAttribute('data-nama');
            const harga = parent.getAttribute('data-harga');
            const kategori = parent.getAttribute('data-kategori');
            const foto = parent.getAttribute('data-foto');

            // Isi form edit
            editNama.value = nama;
            editHarga.value = harga;
            editKategori.value = kategori; // Set kategori sesuai data
            imagePreviewEdit.src = `../../../${foto}`;
            imagePreviewEdit.style.display = 'block';

            // Tampilkan form edit
            formContainerEdit.style.display = 'block';
        });
    });

    // Event listener untuk tombol Batal pada form Edit
    cancelEditButton.addEventListener('click', () => {
        formContainerEdit.style.display = 'none'; // Sembunyikan form edit
        imagePreviewEdit.src = '#'; // Reset preview gambar
        imagePreviewEdit.style.display = 'none'; // Sembunyikan gambar
    });

    // Event listener untuk preview gambar
    imageInputEdit.addEventListener('change', (event) => {
        const file = event.target.files[0]; // Ambil file yang dipilih
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreviewEdit.src = e.target.result; // Set src gambar ke hasil pembacaan file
                imagePreviewEdit.style.display = 'block'; // Tampilkan gambar
            };
            reader.readAsDataURL(file); // Baca file sebagai URL data
        } else {
            imagePreviewEdit.src = '#'; // Reset preview gambar jika tidak ada file
            imagePreviewEdit.style.display = 'none'; // Sembunyikan gambar
        }
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
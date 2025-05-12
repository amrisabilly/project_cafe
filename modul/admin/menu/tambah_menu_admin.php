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

        <div class="d-flex justify-center align-items-center p-4" style="width: 100%;">
            <div class="d-flex justify-center align-items-center rounded-3" style="background-color: #B7DBFD;width: 100%;height: 3em;">
                <h1 class="text-center p-3" style="font-size: 17px;margin: 0;">Pesanan Berhasil Ditambahkan!!!</h1>
            </div>
        </div>


    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="menu_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
    </div>

    <!-- Form Add -->
    <form action="../../../config/admin/add_menu.php" method="post" enctype="multipart/form-data">
        <div id="formContainerAdd" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 35em; padding: 2em; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem; font-size: 14px;">
            <div style="background-color: #EAABAB; height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.6em; border-radius: 1.5rem;">
                <!-- Preview Gambar -->
                <div style="width: 70px; height: 70px; border-radius: 8px; border: 1px solid #ccc; display: flex; overflow: hidden; background-color: #f8f8f8;align-self: flex-start; margin-left: 10%;">
                    <img id="imagePreviewAdd" src="#" alt="Preview Gambar" style="width: 100%; height: 100%; object-fit: cover; display: none;" />
                </div>
                
            <!-- Input File -->
            <input name="foto" id="imageInputAdd" type="file" accept="image/*" style="border-radius: 5px; align-self: flex-start; margin-left: 10%; border: none; visibility: hidden;" />
            <label for="imageInputAdd" class="text-black" style="cursor: pointer; color: white; background-color: #ffffff; padding: 5px 10px; border-radius: 5px; font-size: 14px;align-self: flex-start; margin-left: 10%;">Pilih Gambar</label>

            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Nama Menu</label>
            <input name="nama" placeholder="Nama Menu" style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />
            
            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Kategori</label>
            <select name="kategori" style="padding: 1px; width: 80%; border-radius: 5px; font-size: 13px; border: none;">
                <option value="Main Course" style="font-size: 10px;">Main Course</option>
                <option value="Appetizer" style="font-size: 10px;">Appetizer</option>
                <option value="Dessert" selected style="font-size: 10px;">Dessert</option>
                <option value="Beverage" style="font-size: 10px;">Beverage</option>
                <option value="Coffee" style="font-size: 10px;">Coffee</option>
                <option value="Non Coffee" style="font-size: 10px;">Non Coffee</option>
            </select>
            
            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Harga</label>
            <input name="harga" type="number" placeholder="Rp. " style="padding: 5px; width: 80%; border-radius: 5px; border: none;" />
            
            <div class="d-flex justify-content-between align-items-center" style="width: 80%; margin-top: 1em;">
                <a href="menu_admin.php">
                    <button class="rounded-3 p-1" style="background-color: #AF5C5C;">Kembali</button>
                </a>
                <button id="submit" class="rounded-3 p-1" style="background-color: #AF5C5C;">Tambah</button>
            </div>
        </div>
    </form>
    </div>

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
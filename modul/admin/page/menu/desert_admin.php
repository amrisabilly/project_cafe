<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Papa Kita</title>

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

    <!-- Fonts Family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Inknut Antiqua', serif;">
    <section class="mb-5">
        <div class="d-flex justify-content-center align-items-center" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 3em;">
            <h1 class="fw-bold text-center" style="font-size: 20px;">APPETIZER & DESSERT</h1>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center px-3 gap-3">
            <div class="rounded-4 d-flex justify-content-between align-items-center px-4" style="background-color: #D9D9D9;width: 100%;height: 5em;">
                <div class="d-flex justify-content-between align-items-center gap-3">
                    <img src="../../../../public/admin/unnamed.jpg" alt="" class="rounded-3" style="width: 38px;height: 38px;">
                    <div class="d-flex flex-column justify-content-center" style="padding-top: 12px">
                        <h3 class="fw-bold" style="font-size: 15px;">Nasi Ayam Geprek</h3>
                        <p style="font-size: 15px;">Rp <span>18.000</span></p>
                    </div>
                </div>
                <div>
                    <button style="border: none; background-color: transparent;">
                        <img src="../../../../public/admin/Trash.png" alt="" class="rounded-3" style="width: 26px;height: 29px;">
                    </button>
                    <button class="edit" style="border: none; background-color: transparent;">
                        <img src="../../../../public/admin/Edit.png" alt="" class="rounded-3" style="width: 26px;height: 29px;">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <div class="tombol d-flex justify-content-between align-items-center" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 4em; padding: 2em;">
        <a href="menu_admin.php" class="fw-bold text-black" id="backButton" style="background-color: transparent;border: none;font-size: 15px;text-decoration: none;">
            <img src="../../../../public/admin/kembali.png" alt="kembali">
            Kembali</a>
    </div>

    <!-- Form Edit -->
    <div id="formContainerEdit" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 27em; padding: 2em; display: none; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem;font-size: 15px;">
        <div style="background-color: #EAABAB; height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.5em;border-radius: 1.5rem;">
            <input id="imageInputEdit" type="file" accept="image/*" style="border-radius: 5px;align-self: flex-start;margin-left: 10%;" />
            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Nama Menu</label>
            <input placeholder="Nama Menu" style="padding: 5px; width: 80%;border-radius: 5px;"></input>
            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Kategori</label>
            <select style="padding: 1px; width: 80%; border-radius: 5px;font-size: 13px;">
                <option value="Main Course" style="font-size: 10px;">Main Course</option>
                <option value="Appetizer" style="font-size: 10px;">Appetizer</option>
                <option value="Dessert" style="font-size: 10px;">Dessert</option>
                <option value="Beverage" style="font-size: 10px;">Beverage</option>
            </select>
            <label class="fw-bold" for="" style="align-self: flex-start; margin-left: 10%;">Harga</label>
            <input type="number" placeholder="Harga" style="padding: 5px; width: 80%; border-radius: 5px;" />
            <div class="d-flex justify-content-between align-items-center" style="width: 80%;margin-top: 1em;">
                <button id="cancelEditButton" class="rounded-3" style="background-color:rgb(212, 46, 46);">Batal</button>
                <button id="submitEditButton" class="rounded-3" style="background-color:rgb(17, 222, 89);">Submit</button>
            </div>
        </div>
    </div>

    <script>
        const editButtons = document.querySelectorAll('.edit'); // Mengambil semua tombol dengan kelas 'edit'
        const formContainerEdit = document.getElementById('formContainerEdit');
        const cancelEditButton = document.getElementById('cancelEditButton');

        // Event listener untuk semua tombol Edit
        editButtons.forEach((editButton) => {
            editButton.addEventListener('click', () => {
                formContainerEdit.style.display = 'block'; // Pastikan form edit ditampilkan
            });
        });

        // Event listener untuk tombol Batal pada Edit
        cancelEditButton.addEventListener('click', () => {
            formContainerEdit.style.display = 'none';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
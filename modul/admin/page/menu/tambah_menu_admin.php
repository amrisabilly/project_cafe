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
    <div class="">
        <div class="d-flex justify-content-center align-items-center" style="background-color: #D9D9D9;width: 100%;height: 5em;margin-top: 3em;margin-bottom: 1em;">
            <h1 class="fw-bold text-center" style="font-size: 20px;">TAMBAH MENU</h1>
        </div>
    </div>

    <!-- Error handling -->
    <div class="d-flex justify-center align-items-center p-4" style="width: 100%;">
        <div class="d-flex justify-center align-items-center rounded-3" style="background-color: #B7DBFD;width: 100%;height: 3em;">
            <h1 class="text-center p-3" style="font-size: 17px;margin: 0;">Pesanan Berhasil Ditambahkan!!!</h1>
        </div>
    </div>
    <!-- Form Add -->
    <div id="formContainer" class="form" style="background-color: #AF5C5C; position: fixed; bottom: 0; width: 100%; height: 27em; padding: 2em; border-top-left-radius: 1.5rem; border-top-right-radius: 1.5rem;font-size: 15px;">
        <div style="background-color: #EAABAB; height: 100%; display: flex; justify-content: center; align-items: center; flex-direction: column; gap: 0.5em;border-radius: 1.5rem;">
            <input type="file" accept="image/*" style="border-radius: 5px;align-self: flex-start;margin-left: 10%;" />
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
                <a href="menu_admin.php" id="cancelButton" class="rounded-3 text-white text-decoration-none text-center" style="background-color:rgb(212, 46, 46); padding: 5px 15px;">Batal</a>
                <button id="submitButton" class="rounded-3" style="background-color:rgb(17, 222, 89); padding: 5px 15px;">Submit</button>
            </div>
        </div>
    </div>

    <script>
        // Langsung tampilkan form tambah saat halaman dibuka
        document.addEventListener('DOMContentLoaded', () => {
            const formContainer = document.getElementById('formContainer');
            formContainer.style.display = 'block';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>
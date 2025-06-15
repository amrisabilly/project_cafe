<?php
include '../koneksi.php';

session_start(); // Memulai sesi

$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa login
$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($login) > 0) {
    // Login berhasil, simpan data ke sesi
    $_SESSION['username'] = $username;

    // Redirect ke halaman admin
    header("location:../../modul/admin/login/sukses_login.php");
    exit;
} else {
    // Login gagal, redirect ke halaman gagal login
    header("location:../../modul/admin/login/gagal_login.php");
    exit;
}
?>
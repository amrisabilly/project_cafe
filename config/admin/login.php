<?php
include '../koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
if (mysqli_num_rows($login) > 0) {
    session_start();
    $_SESSION['username'] = $username;
    header("location:../../modul/admin/menu/menu_admin.php");
} else {
    header("location:../../modul/admin/login/gagal_login.php");
}
?>
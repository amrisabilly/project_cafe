<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $meja = $_POST['meja'];

    // Validasi input
    if (empty($username) || empty($meja)) {
        header('Location: ../../../modul/user/login/index.php?error=empty_fields');
        exit;
    }

    // Simpan data ke sesi
    $_SESSION['username'] = $username;
    $_SESSION['meja'] = $meja;
    
    var_dump($_SESSION['meja']);


    // Redirect ke halaman menu
    header('Location: ../../modul/user/menu/index.php');
    exit;
} else {
    // Jika bukan metode POST, redirect ke halaman login
    header('Location: ../../modul/user/login/index.php');
    exit;
}
?>
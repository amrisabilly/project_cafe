<?php
session_start();
include '../../../config/koneksi.php';
// Hapus semua data session 
session_destroy();
// Redirect ke halaman login
header('Location: ../../modul/user/login/index.php');
exit;
?>
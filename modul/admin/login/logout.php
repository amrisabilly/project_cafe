<?php
session_start(); // Memulai sesi

// Hapus semua data sesi
session_unset();
session_destroy();

// Redirect ke halaman login
header("Location: login.php");
exit;
?>
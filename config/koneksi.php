<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "latihan"; 
$port = 3336; 

$koneksi = new mysqli($host, $user, $password, $database, $port);
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
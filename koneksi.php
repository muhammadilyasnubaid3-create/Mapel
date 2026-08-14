<?php 
//Ini masuknya ke variabel
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_todolist";

//Membuat Koneksi Database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Untuk mengecek apakah koneksi sudah terbuhubung atau belum(sudah berhasil)
if (!$koneksi){
    die("koneksi gagal: " . mysqli_connect_error());
}
?>
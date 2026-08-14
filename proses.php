<?php
// Mode debugging (menampilkan error jika ada)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Panggil koneksi
include 'koneksi.php';

// 1. PROSES TAMBAH TUGAS
if (isset($_POST['tambah'])) {
    $task_name = mysqli_real_escape_string($koneksi, $_POST['task_name']);

    if (!empty($task_name)) {
        $query = "INSERT INTO tasks (task_name) VALUES ('$task_name')";
        $exec  = mysqli_query($koneksi, $query);

        if (!$exec) {
            die("Error SQL Tambah: " . mysqli_error($koneksi));
        }
    }
    
    header("Location: index.php");
    exit();
}

// 2. PROSES UBAH STATUS (SELESAI)
if (isset($_GET['selesai'])) {
    $id    = mysqli_real_escape_string($koneksi, $_GET['selesai']);
    $query = "UPDATE tasks SET status = 'completed' WHERE id = '$id'";
    $exec  = mysqli_query($koneksi, $query);

    if (!$exec) {
        die("Error SQL Selesai: " . mysqli_error($koneksi));
    }

    header("Location: index.php");
    exit();
}

// 3. PROSES HAPUS TUGAS
if (isset($_GET['hapus'])) {
    $id    = mysqli_real_escape_string($koneksi, $_GET['hapus']);
    $query = "DELETE FROM tasks WHERE id = '$id'";
    $exec  = mysqli_query($koneksi, $query);

    if (!$exec) {
        die("Error SQL Hapus: " . mysqli_error($koneksi));
    }

    header("Location: index.php");
    exit();
}

// Jika diakses langsung tanpa aksi, kembalikan ke index.php
header("Location: index.php");
exit();
?>
<?php

$url = $_SERVER['REQUEST_URI'];
$parts = explode('/', $url);
$userId = end($parts); // ID pengguna adalah elemen terakhir dalam array

// Lakukan validasi ID pengguna (misalnya, pastikan itu adalah angka positif)

// Hapus pengguna dari basis data
// Contoh: menghubungkan ke basis data dan menjalankan query DELETE
$server = "localhost";
$username = "root";
$password = "";
$dbname = "db_akademik";

$conn = mysqli_connect($server, $username, $password, $dbname);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = "DELETE FROM users WHERE id = '$userId'"; // Ganti 'users' dengan nama tabel Anda
if (mysqli_query($conn, $sql)) {
    echo "Pengguna dengan ID $userId telah dihapus.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
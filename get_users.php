<?php
include 'db_config.php';
$sql = "SELECT id, NIM, name, progstud, email, alamat, tanggal_lahir, jenis_kelamin FROM users";
$result = $koneksi->query($sql);
$users = array();
if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 $users[] = $row;
 }
}
header('Content-Type: application/json');
echo json_encode($users);
$koneksi->close();
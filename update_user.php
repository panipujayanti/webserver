<?php
header("Content-Type: application/json");

include 'db_config.php';

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

if (!isset($data->id) || !isset($data->NIM) || !isset($data->name) || !isset($data->progstud)|| !isset($data->email) || !isset($data->alamat) || !isset($data->tanggal_lahir) || !isset($data->jenis_kelamin)) {
    die(json_encode(["error" => "Invalid input"]));
}

$id = $koneksi->real_escape_string($data->id);
$NIM = $koneksi->real_escape_string($data->NIM);
$name = $koneksi->real_escape_string($data->name);
$progstud = $koneksi->real_escape_string($data->progstud);
$email = $koneksi->real_escape_string($data->email);
$alamat = $koneksi->real_escape_string($data->alamat);
$tanggal_lahir = $koneksi->real_escape_string($data->tanggal_lahir);
$jenis_kelamin = $koneksi->real_escape_string($data->jenis_kelamin);

$sql = "UPDATE users SET NIM ='$NIM', name='$name', progstud='$progstud', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' WHERE id=$id";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}

$koneksi->close();
?>
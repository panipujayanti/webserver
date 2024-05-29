<?php
header("Content-Type: application/json");
include 'db_config.php';

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Validate the data
if (
    !isset($data->NIM) || !isset($data->name) || !isset($data->progstud) || empty($data->progstud) || !isset($data->email) || !isset($data->alamat) || !isset($data->tanggal_lahir) || !isset($data->jenis_kelamin)) {
    die(json_encode(["error" => "Invalid input"]));
}


$NIM = $koneksi->real_escape_string($data->NIM);
$name = $koneksi->real_escape_string($data->name);
$progstud = $koneksi->real_escape_string($data->progstud);
$email = $koneksi->real_escape_string($data->email);
$alamat = $koneksi->real_escape_string($data->alamat);
$tanggal_lahir = $koneksi->real_escape_string($data->tanggal_lahir);
$jenis_kelamin = $koneksi->real_escape_string($data->jenis_kelamin);

$sql = "INSERT INTO users (NIM, name, progstud, email, alamat, tanggal_lahir, jenis_kelamin) VALUES ('$NIM','$name', '$progstud', '$email', '$alamat', '$tanggal_lahir', '$jenis_kelamin')";

if ($koneksi->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["error" => $koneksi->error]);
}

$koneksi->close();
?>

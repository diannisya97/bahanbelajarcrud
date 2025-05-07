<?php
require_once 'database.php';

// Ambil data dari body request (POSTMAN)
$data = json_decode(file_get_contents("php://input"), true);

// Pastikan semua atribut yang diperlukan ada
if (
    isset($data['nip'], $data['nama_dosen'], $data['email'], $data['username'], $data['no_hp'], $data['alamat'])
) {
    $nip = mysqli_real_escape_string($conn, $data['nip']);
    $nama_dosen = mysqli_real_escape_string($conn, $data['nama_dosen']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $username = mysqli_real_escape_string($conn, $data['username']);
    $no_hp = mysqli_real_escape_string($conn, $data['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $data['alamat']);

    // Query untuk menambahkan data ke tabel dosen
    $query = "INSERT INTO dosen (nip, nama_dosen, email, username, no_hp, alamat) 
              VALUES ('$nip', '$nama_dosen', '$email', '$username', '$no_hp', '$alamat')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        http_response_code(201); // Created
        echo json_encode(["status" => "success", "message" => "Data dosen berhasil ditambahkan"]);
    } else {
        http_response_code(500); // Server error
        echo json_encode(["status" => "error", "message" => "Gagal menambahkan data dosen"]);
    }
} else {
    http_response_code(400); // Bad request
    echo json_encode(["status" => "error", "message" => "Data tidak lengkap"]);
}
?>
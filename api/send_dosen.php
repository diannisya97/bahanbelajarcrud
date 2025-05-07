<?php
require_once 'database.php';

// 1. Ambil data dari DB lokal
$query = "SELECT nip, nama_dosen, alamat FROM dosen";
$result = mysqli_query($conn, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// 2. Siapkan request ke API
$api_url = "http://localhost/belajar-api/api/receive_petugas.php";
$api_key = "bahanbelajar123"; // API Key lokal

$headers = [
    'Content-Type: application/json',
    'X-API-Key: ' . $api_key
];

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $api_url,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_RETURNTRANSFER => true
]);

// 3. Eksekusi request
$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    die("Error: " . curl_error($ch));
}

curl_close($ch);

// 4. Tampilkan hasil
http_response_code($http_code);
echo $response;
?>
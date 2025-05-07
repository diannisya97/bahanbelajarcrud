<?php
require_once 'database.php'; // Include database connection
header("Content-Type: application/json");

$query = "SELECT * FROM dosen";
$result = mysqli_query($conn, $query);

$response = [];
while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $response
]);
?>
<?php
session_start();

// Enable error reporting (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure user is logged in
if (!isset($_SESSION['fullname']) || !isset($_SESSION['department'])) {
    http_response_code(401);
    echo json_encode(["error" => "Unauthorized"]);
    exit;
}

$fullname = $_SESSION['fullname'];
$department = $_SESSION['department'];

// Database connection
$conn = new mysqli("localhost", "root", "", "inventory_db");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $conn->connect_error]);
    exit;
}

// Read and decode JSON
$data = json_decode(file_get_contents("php://input"), true);
$items = $data['items'] ?? [];
$logDate = $data['logDate'] ?? date('Y-m-d');

if (empty($items)) {
    http_response_code(400);
    echo json_encode(["error" => "No items received."]);
    exit;
}

foreach ($items as $item) {
    $matcode = $item['matcode'] ?? null;
    $description = $item['name'] ?? '';
    $uom = $item['uom'] ?? '';
    $qty = (int)($item['qty'] ?? 0);

    if (!$matcode || $qty <= 0) continue;

    // Insert into log table
    $stmt = $conn->prepare("INSERT INTO log (logDate, fullname, department, description, uom, quantity) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $logDate, $fullname, $department, $description, $uom, $qty);
    $stmt->execute();
    $stmt->close();

    // Update inventory
    $update = $conn->prepare("UPDATE inventory SET quantity = quantity - ? WHERE matcode = ?");
    $update->bind_param("is", $qty, $matcode);
    $update->execute();
    $update->close();
}

$conn->close();
echo json_encode(["success" => true]);

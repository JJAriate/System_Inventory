<?php
// get_items.php

header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$pass = "";
$db = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$sql = "SELECT matcode, name, category FROM inventory";
$result = $conn->query($sql);

$items = [
  "Paper & Paper Products" => [],
  "Printed Forms" => [],
  "Supplies – Others" => []
];

while ($row = $result->fetch_assoc()) {
  if (isset($items[$row["category"]])) {
    $items[$row["category"]][] = [
      "matcode" => $row["matcode"],
      "name" => $row["name"],
      "img" => "https://dummyimage.com/60x60/f7c948/000&text=" . substr($row["name"], 0, 1)
    ];
  }
}

echo json_encode($items);

$conn->close();
?>

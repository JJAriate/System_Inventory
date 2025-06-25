<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set headers for Excel file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=inventory_export.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Start table
echo "<table border='1'>";
echo "<tr>
        <th>Material Code</th>
        <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>UOM</th>
        <th>Quantity</th>
      </tr>";

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>{$row['matcode']}</td>
            <td>{$row['name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['category']}</td>
            <td>{$row['uom']}</td>
            <td>{$row['quantity']}</td>
          </tr>";
}

echo "</table>";
$conn->close();
?>

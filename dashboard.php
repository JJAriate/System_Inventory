<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventory Dashboard</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      height: 100vh;
      background-color: #f9f0fc;
    }

    .sidebar {
      width: 220px;
      background-color: #014a94;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar .logo {
      text-align: center;
      padding: 20px;
      border-bottom: 1px solid #ffffff33;
    }

    .sidebar .logo img {
      height: 60px;
    }

    .sidebar nav {
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    .sidebar nav a {
      color: white;
      text-decoration: none;
      padding: 12px;
      border-radius: 6px;
      margin-bottom: 10px;
      background-color: #003e7e;
      text-align: center;
    }

    .sidebar nav a:hover {
      background-color: #002f60;
    }

    .logout {
      padding: 20px;
      text-align: center;
    }

    .logout a {
      background-color: #d9534f;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      display: inline-block;
    }

    .main {
      flex: 1;
      padding: 30px;
      overflow-y: auto;
    }

    .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .top-bar h2 {
      color: #014a94;
    }

    .top-bar form button {
      background-color: #28a745;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 4px;
      font-size: 14px;
      cursor: pointer;
    }

    .top-bar form button:hover {
      background-color: #218838;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: #fff;
    }

    th, td {
      padding: 12px;
      border: 1px solid #ddd;
      text-align: center;
    }

    th {
      background-color: #014a94;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  
<div class="sidebar">
  <div>
    <div class="logo">
      <img src="Pictures/sssanim2.gif" alt="SSS Logo" />
      <div style="margin-top: 10px; font-size: 13px;">PASAY - TAFT BRANCH</div>
    </div>
    <nav>
      <a href="stock_in_quantity.php">Stock In</a>
      <a href="dashboard.php">Inventory</a>
      <a href="#">History</a>

    </nav>
  </div>

  <div class="logout">
    <a href="login.html" onclick="return confirmLogout()">Logout</a>
  </div>

  <script>
    function confirmLogout() {
      return confirm("Are you sure you want to log out?");
    }
  </script>
</div>

<div class="main">
  <div class="top-bar">
    <h2>Inventory Dashboard</h2>
    <form action="export_excel.php" method="post">
      <button type="submit">Export to Excel</button>
    </form>
  </div>

  <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "inventory_db";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("<p style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    $sql = "SELECT * FROM inventory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                  <th>Material Code</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>UOM</th>
                  <th>Quantity</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['matcode']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . htmlspecialchars($row['description']) . "</td>
                    <td>" . htmlspecialchars($row['category']) . "</td>
                    <td>" . htmlspecialchars($row['uom']) . "</td>
                    <td>" . htmlspecialchars($row['quantity']) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No inventory data found.</p>";
    }

    $conn->close();
  ?>
</div>
</body>
</html>

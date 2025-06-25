<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stock In Quantity</title>

<!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Include jQuery (required) and Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

    .main h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #014a94;
    }

    form {
      background-color: #fff;
      padding: 20px;
      max-width: 600px;
      margin: 0 auto;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    label {
      margin-top: 10px;
      display: block;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 4px;
      border: 1px solid #ccc;
    }

    input[type="submit"] {
      background-color: #014a94;
      color: white;
      border: none;
      margin-top: 20px;
      padding: 10px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #002f60;
    }

    .message {
      text-align: center;
      margin-top: 15px;
    }

    .error {
      color: red;
    }

    .success {
      color: green;
    }

    .search-container {
      margin-top: 10px;
    }

    #itemSelect option {
      padding: 5px;
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
  <h2>Stock In Quantity</h2>

  <form action="stock_in_quantity.php" method="POST">
    <label for="matcode_update">Select Item:</label>
    <select name="matcode_update" id="itemSelect" class="select2" required>
  <option value="" disabled selected>-- Choose item --</option>
  <?php
    $conn = new mysqli("localhost", "root", "", "inventory_db");
    $sql = "SELECT matcode, description FROM inventory ORDER BY name ASC";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
      echo "<option value='{$row['matcode']}'>{$row['matcode']} - {$row['description']}</option>";
    }
    $conn->close();
  ?>
</select>

    <label for="quantity_update">Quantity to Add:</label>
    <input type="number" name="quantity_update" required min="1" value="1">

    <input type="submit" name="update_quantity" value="Add Quantity">
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $conn = new mysqli("localhost", "root", "", "inventory_db");

    if ($conn->connect_error) {
      echo "<p class='message error'>❌ Connection failed: " . $conn->connect_error . "</p>";
      exit;
    }

    $matcode = $_POST['matcode_update'];
    $addQty = (int)$_POST['quantity_update'];

    $check = $conn->prepare("SELECT quantity FROM inventory WHERE matcode = ?");
    $check->bind_param("s", $matcode);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows === 0) {
      echo "<p class='message error'>❌ Material code not found.</p>";
    } else {
      $row = $result->fetch_assoc();
      $newQty = $row['quantity'] + $addQty;

      $update = $conn->prepare("UPDATE inventory SET quantity = ? WHERE matcode = ?");
      $update->bind_param("is", $newQty, $matcode);

      if ($update->execute()) {
        echo "<p class='message success'>✅ Quantity updated successfully!</p>";
      } else {
        echo "<p class='message error'>❌ Update failed: " . $update->error . "</p>";
      }

      $update->close();
    }

    $check->close();
    $conn->close();
  }
  ?>
</div>

<script>
  function filterItems() {
    const search = document.getElementById("search").value.toLowerCase();
    const options = document.querySelectorAll("#itemSelect option");

    options.forEach(option => {
      const text = option.textContent.toLowerCase();
      option.style.display = text.includes(search) ? "" : "none";
    });
  }
</script>

<script>
  $(document).ready(function() {
    $('#itemSelect').select2({
      placeholder: "-- Choose item --"
    });
  });
</script>


</body>
</html>

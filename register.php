<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "inventory_db";

// Connect to MySQL
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$username   = $_POST['username'];
$password   = $_POST['password'];
$name       = $_POST['name'];
$department = $_POST['department'];

// Check if username exists
$check = $conn->prepare("SELECT * FROM users WHERE username = ?");
$check->bind_param("s", $username);
$check->execute();
$result = $check->get_result();

if ($result->num_rows > 0) {
    echo "Username already taken. Please <a href='register.html'>try another</a>.";
} else {
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (username, password, name, department) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $hashedPassword, $name, $department);

    if ($stmt->execute()) {
        echo "✅ Registration successful! You can now <a href='login.html'>log in</a>.";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
}

$check->close();
$conn->close();
?>

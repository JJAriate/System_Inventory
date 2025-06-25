<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "inventory_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$department = $_POST['department'];
$adminAction = $_POST['adminAction'] ?? '';
$fullname = $_POST['fullname'] ?? '';

if ($department === 'Admin' && $adminAction === 'Inventory') {
    // Admin Inventory – requires username & password
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND department = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['department'] = $user['department'];
            header("Location: dashboard.php");
            exit;
        } else {
            echo "<script>alert('❌ Invalid password.'); window.location.href = 'login.html';</script>";
        }
    } else {
        echo "<script>alert('❌ Invalid username or department.'); window.location.href = 'login.html';</script>";
    }

    $stmt->close();
} else {
    // Stock Out or other departments – just full name
    if (!empty($fullname)) {
        $_SESSION['fullname'] = $fullname;
        $_SESSION['department'] = $department;
        header("Location: user.html");
        exit;
    } else {
        echo "<script>alert('❗ Please enter your full name.'); window.location.href = 'login.html';</script>";
    }
}

$conn->close();
?>

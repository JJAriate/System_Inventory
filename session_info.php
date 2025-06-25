<?php
session_start();
header('Content-Type: application/json');

// Check if fullname and department are stored in the session
if (isset($_SESSION['fullname']) && isset($_SESSION['department'])) {
    echo json_encode([
        'fullname' => $_SESSION['fullname'],
        'department' => $_SESSION['department']
    ]);
} else {
    echo json_encode([
        'fullname' => null,
        'department' => null
    ]);
}
?>

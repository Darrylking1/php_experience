<?php
if (isset($_GET['deleteid'])) {
    $idToDelete = $_GET['deleteid'];

    $host = "localhost";
    $dbname = "user_db";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        die("Connection error: " . mysqli_connect_errno());
    }

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 's', $idToDelete);
    mysqli_stmt_execute($stmt);

    header("Location: view_users.php");
    exit;
}
?>

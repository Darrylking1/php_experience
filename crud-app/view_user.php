<?php
$host = "localhost";
$dbname = "user_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
}

if (isset($_GET['viewid'])) {
    $idToView = $_GET['viewid'];

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'i', $idToView);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        
        $gender = $row["gender"];
        $name = $row["name"];
        $number = $row["number"];
        $ghana_card_id = $row["ghana_card_id"];
    } else {
        echo "User not found.";
        exit;
    }
} else {
    echo "User ID not provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>User Information</h1>
    <form action="view_user.php?id=<?php echo $idToView; ?>" method="post">
        <label for="Gender">Gender</label>
        <input type="text" id="Gender" name="Gender" value="<?php echo $gender; ?>" readonly><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" readonly><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" value="<?php echo $number; ?>" readonly><br>

        <label for="ghana_card_id">Ghana Card ID:</label>
        <input type="text" id="ghana_card_id" name="ghana_card_id" value="<?php echo $ghana_card_id; ?>" readonly><br>

        <a class="btn btn-primary" href="view_users.php">Back</a>
    </form>
</body>
</html>

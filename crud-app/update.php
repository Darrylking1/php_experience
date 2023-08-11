
<?php
$host = "localhost";
$dbname = "user_db";
$username = "root";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_errno());
}

if (isset($_GET['updateid'])) {
    $idToUpdate = $_GET['updateid'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle the form submission to update user information
        $gender = filter_input(INPUT_POST, "gender", FILTER_VALIDATE_INT);
        $name = $_POST["name"];
        $number = $_POST["number"];
        $ghana_card_id = $_POST["ghana_card_id"];

        $errors = array();


        if (strlen($number) != 10 || !is_numeric($number)) {
            $err = "Error: The phone number must be a 10-digit numeric value.";
            array_push($errors, $err);
        }
        if (!preg_match('/^(GHA)-[0-9]{9}-[0-9]$/', $ghana_card_id)) {
            $err = "Error: Enter the required pattern.";
            array_push($errors, $err);
        }

        if (empty($errors)){
            $sql = "UPDATE `users` SET `gender` = ?, `name` = ?, `number` = ?, `ghana_card_id` = ? WHERE `id` = ?";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                die(mysqli_error($conn));
            }

            mysqli_stmt_bind_param($stmt, 'issss', $gender, $name, $number, $ghana_card_id, $idToUpdate);
            mysqli_stmt_execute($stmt);

            header("Location: view_users.php");

            exit;
        }else{
            foreach ($errors as $error){
                echo "<p class='text-danger text-center'><strong>$error</strong></p>";
        }

    }
}
    

    $sql = "SELECT * FROM users WHERE `id` = ?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'i', $idToUpdate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        // Display the update form with pre-filled values for the user
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    
</head>
<body>
    <h1>Update User Information</h1>
    <form action="update.php?updateid=<?php echo $idToUpdate; ?>" method="post">
        <label for="gender">Gender</label>
        <select name="gender" id="gender">
            <option value="1" <?php echo ($row["gender"] == 1) ? 'selected' : ''; ?>>Male</option>
            <option value="2" <?php echo ($row["gender"] == 2) ? 'selected' : ''; ?>>Female</option>
            <option value="3" <?php echo ($row["gender"] == 3) ? 'selected' : ''; ?>>Other</option>
        </select><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" placeholder="Enter your name" required><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" value="<?php echo $row["number"]; ?>"  placeholder="Enter your phone number" required><br>

        <label for="ghana_card_id">Ghana Card ID(GHA-XXXXXXXXX-X):</label>
        <input type="text" id="ghana_card_id" name="ghana_card_id" value="<?php echo $row["ghana_card_id"]; ?>"  placeholder="GHA-XXXXXXXXX-X" required ><br>

        <button type="submit" value="Submit">Update</button>
    </form>
</body>
</html>

<?php
    } else {
        // Handle the case where the user with the given ID does not exist
        echo "User not found!";
    }
}
?>

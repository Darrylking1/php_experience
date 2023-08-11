<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gender = filter_input(INPUT_POST, "gender", FILTER_VALIDATE_INT);
    $name = $_POST["name"];
    $number = $_POST["number"];
    $ghana_card_id = $_POST["ghana_card_id"];

    $errors = array();

    if (strlen($number) != 10 || !is_numeric($number)) {
        $err = "The phone number must be a 10-digit numeric value.";
        array_push($errors, $err);
    }
    if (!preg_match('/^(GHA)-[0-9]{9}-[0-9]$/', $ghana_card_id)) {
        $err = "Enter the required pattern for Ghana Card ID.";
        array_push($errors, $err);
    }

    if (empty($errors)) {
        $host = "localhost";
        $dbname = "user_db";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (mysqli_connect_errno()) {
            die("Connection error: " . mysqli_connect_errno());
        }

        $sql = "INSERT INTO `users` (`id`, `gender`, `name`, `number`, `ghana_card_id`) VALUES (UUID(),?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            die(mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, 'isss', $gender, $name, $number, $ghana_card_id);
        mysqli_stmt_execute($stmt);

        header("Location: view_users.php");
        exit;
    } else {
        foreach ($errors as $error) {
            echo "<p class='text-danger text-center'><strong>$error</strong></p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER INFORMATION FORM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>User Information Form</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="Gender">Gender</label>
        <select name="gender" id="gender">
            <option value="1" selected>Male</option>
            <option value="2">Female</option>
            <option value="3">Other</option>
        </select><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number" placeholder="Enter your phone number" required><br>

        <label for="ghana_card_id">Ghana Card ID (Format: GHA-XXXXXXXXX-X):</label>
        <input type="text" id="ghana_card_id" name="ghana_card_id" placeholder="GHA-XXXXXXXXX-X"><br>

        <button class="btn btn-success" type="submit" value="Submit">Submit</button>
    </form>
</body>
</html>

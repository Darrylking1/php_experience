<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body style="background-color: #f8f9fa;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Users</h1>
                    </div>
                    
                    <div class="card-body">
                    <form method="GET" action=""> 
                        <div class="input-group mb-3">  
                                <input type="text" class="form-control" name="search" placeholder="Search users..." aria-label="Search users...">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </form>
                        <?php
                        $host = "localhost";
                        $dbname = "user_db";
                        $username = "root";
                        $password = "";
                       
                        $conn = mysqli_connect($host, $username, $password, $dbname);
                        if ($conn->connect_error) {
                           die("Connection error: " . $conn->connect_error);
                        }
                       
                        $search = isset($_GET['search']) ? $_GET['search'] : '';
            
                        $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR number LIKE '%$search%' OR ghana_card_id LIKE '%$search%'";
                        $result = $conn->query($sql);
            
                        if (!$result) {
                            die("Invalid query: " . $conn->error);
                        }
                        
                        if ($result->num_rows === 0) {
                            echo "<p>No records found.</p>";
                        } else {
                            echo "<table class='table table-bordered'>
                                <thead>
                                    <tr class='bg-light'>
                                        <th>ID</th>
                                        <th>Gender</th>
                                        <th>Name</th>
                                        <th>Number</th>
                                        <th>Ghana Card ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";
            
                            while ($row = $result->fetch_assoc()) {
                                $genderLabel = "";
                                    if ($row["gender"] == 1) {
                                        $genderLabel = "Male";
                                    } elseif ($row["gender"] == 2) {
                                        $genderLabel = "Female";
                                    } elseif ($row["gender"] == 3) {
                                        $genderLabel = "Other";
                                    }
                                echo "<tr> 
                                <td>" . $row["id"] . "</td>
                                <td>" .$genderLabel . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["number"] . "</td>
                                <td>" . $row["ghana_card_id"] . "</td>
                                <td>
                                <a class='btn btn-secondary btn-sm' href='view_user.php?viewid=" . $row["id"] . "'>View</a>
                                <a class='btn btn-primary btn-sm' href='update.php?updateid=" . $row["id"] . "'>Update</a>
                                <a class='btn btn-danger btn-sm' href='delete.php?deleteid=" . $row["id"] . "'>Delete</a>
                                </td>
                                </tr>";
                            }
            
                            echo "</tbody>
                                </table>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

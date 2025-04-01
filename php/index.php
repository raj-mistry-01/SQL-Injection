<?php
$conn = new mysqli("localhost", "root", "", "vuln_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($query);
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    if ($result->num_rows > 0) {
        // Login successful, fetch all usernames and passwords
        $data_query = "SELECT username, password FROM users";
        $data_result = $conn->query($data_query);
        if (!$data_result) {
            die("Data query failed: " . $conn->error);
        }

        // Store the data in an array to pass to JavaScript
        $users_data = [];
        while ($row = $data_result->fetch_assoc()) {
            $users_data[] = $row;
        }

        // Output "Login successful!" and include JavaScript to log the data
        echo "Login successful!<br>";
        echo "<script>";
        echo "console.log('Hacker accessed user data:');";
        echo "console.log(" . json_encode($users_data) . ");";
        echo "</script>";
    } else {
        echo "Login failed.";
    }
}
?>
<form method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit" name="login" value="Login">
</form>
<?php
$conn = new mysqli("localhost", "root", "", "vuln_db");
if ($conn->connect_error) die("Connection failed");

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo "Login successful!";
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
<?php
session_start();
$database = new mysqli("localhost","root","","notepad");
if($database->connect_error){
    die("Connection failed: " . $database->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST["email"];
    $password = $_POST["password"];
    


    $email = mysqli_real_escape_string($database,$email);
    $password = mysqli_real_escape_string($database,$password);

    $sqldatabase = "SELECT userID, password FROM users WHERE email='$email'";
    


    $result = $database->query($sqldatabase);
    if(mysqli_num_rows($result)>0){
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['userID'];
            header("Location: main.php");
            exit();
        }else {
            $_SESSION["loginerror"] = "Wrong Password";
            header("location: login.php");
            exit();
        }
    }else {
        $_SESSION["loginerror1"] = "Email not found";
        header("location: login.php");
        exit();
    }
}

mysqli_close($database);
?>
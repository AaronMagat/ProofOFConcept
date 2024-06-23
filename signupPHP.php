<?php
$database = new mysqli("localhost","root","","notepad");
if($database->connect_error){
    die("Connection failed: " . $database->connect_error);
}



if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $email = mysqli_real_escape_string($database,$email);
    $password = mysqli_real_escape_string($database,$password);

    if(empty($email) || empty($password)){
        echo "Email or Password should not be empty";
    }else{
        $insertdatabase = "INSERT INTO users (email, password) VALUES ('$email','$password')";
        if(mysqli_query($database, $insertdatabase)){
             echo "Account Created Successfully";
             header("location: login.php");
        }else{
            echo "Error: " . $insertdatabase . "<br>" . $database->error;
        }
    }


}
mysqli_close($database);
?>

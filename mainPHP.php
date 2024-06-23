<?php
session_start();
$database = new mysqli("localhost","root","","notepad");

if($database->connect_error){
    die("Connection failed: " . $database->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    die("User ID is not set in session.");
}

$query = "SELECT title_name, content FROM note WHERE user_ID = '$user_id'";
$result = $database->query($query);

if($_SERVER["REQUEST_METHOD"]== "POST"){

    if(isset($_POST["addnote"])){
        $title_name = $_POST["title_name"];
        $note_content = $_POST["content"]; 

        $title_name = mysqli_real_escape_string($database, $title_name);
        $note_content = mysqli_real_escape_string($database, $note_content);

        $insertdatabase = "INSERT INTO note (user_ID, title_name, content) VALUES ('$user_id', '$title_name', '$note_content')";

        if ($database->query($insertdatabase) === TRUE) {
            header("location: main.php");
            exit();
        } else {
            echo "Error adding note in the database: " . $insertdatabase . "//" . $database->error;
        }
    }
    
    if(isset($_POST["eraseall"])){
        $delete_query = "DELETE FROM note WHERE user_ID = '$user_id'";
        if ($database->query($delete_query) === TRUE) {
            header("location: main.php");
            exit();
        }
    }


    if (isset($_POST["logout"])){
        session_unset();
        session_destroy();
        header("location: login.php");
        exit();
    }
}

mysqli_close($database);
?>

<?php
include "mainPHP.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notepad Homepage</title>
    <link rel="stylesheet" type="text/css" href="maincss.css">
</head>
<body>

    <div class="container">

        <h2>Create your note</h2>

        <form method="post" action="mainPHP.php" class="create-note">
            <label for="title_name">Title name:</label><br>
            <input type="text" id="title_name" name="title_name" placeholder = "Enter your note name"><br><br>
            


            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="10" cols="50" placeholder="Enter your note content here"></textarea><br><br>
            


            <div class="buttons">
                <button type="submit" name="addnote">Add</button>
                <button type="submit" name="eraseall" class="erase">Erase All</button>
                <form method="post" action="mainPHP.php">
                    <div class="logout_button">
                        <button class="logout1" type="submit" name="logout"> Log Out</button>
                    </div>
                </form>
            </div>
        </form>



        <h2>Your Notes</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='note'>";
                echo "<h3>" . htmlspecialchars($row["title_name"]) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($row["content"])) . "</p>";
                echo "</div>";
            }
        } else {
            echo "No notes found.";
        }
        ?>
    </div>
</body>
</html>

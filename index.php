<?php

require 'functions.php';
$conn = connect_to_db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update_db($conn);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap">    
    <h2>Comments list</h2>
    
    <div class='container'>
        <?php
        //showing comments from DB
        $results = $conn->query('SELECT * FROM comments_list');
        foreach ($results as $row) {
            echo "<div class='name'> <h3>" . $row['name'] . "</h3></div>";
            echo "<div class='comment'>" . $row['comment'] . "</div>";
        }
        ?>
    </div>

    <h2>Add new comment</h2>
    <form action="" method='post'>
        <ul>
            <li>
                <input name='name' type="text" placeholder='name'>
            </li>
            <li>
                <textarea name='comment' placeholder='comment'></textarea>
            </li>
            <li>
                <input type="submit" value='Add comment' class='button'>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
<?php

//trying to connect to DB, is succeed return connection
function connect_to_db() {
	try { $conn = new PDO('mysql:host=localhost;
                       dbname=comments',
                      'root',
                      '111111');
	} catch (PDOException $e) {
	    header('Location: error.php');
	}
	return $conn;
}

//insert new comment from POST to DB
function update_db($conn) {
    $comment = $_POST['comment'];
    $name = htmlspecialchars($_POST['name']);
	  $query_string = $conn->prepare("INSERT INTO comments_list (name, comment)
                                    VALUES (:name,:comment)");
    $query_string->bindParam(':name', $name);
    $query_string->bindParam(':comment', $comment);
    $query_string->execute();
}
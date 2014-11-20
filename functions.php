<?php

//connecting to DB with ActiveRecord,adding model
function connect_to_db() {
	try { ActiveRecord\Config::initialize(function($cfg){
          $cfg->set_model_directory('models');
          $cfg->set_connections(array(
          'development' => 'mysql://root:111111@localhost/comments'
          ));
        });
        //require model file with table comments_list
        //also here exception is throwing if problems with DB
        require_once ('models/comments_list.php'); 
        Comment::all();
	} catch (Exception $e) {
	    header('Location: error.php');
        return false;
	}
	return true;
}

//insert new comment from POST to DB
function update_db() {
    $comment = new Comment();
    $comment->name    = htmlspecialchars($_POST['name']);
    $comment->comment = $_POST['comment'];
    $comment->save();
}

//fetching all data from table
function get_all_comments(){
    $comments = Comment::all();
    return $comments;
}
<?php

class Comment extends ActiveRecord\Model {
	 // explicit table name since DB table is not "comments" 
     static $table_name = 'comments_list';
}
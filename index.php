<?php

require_once 'functions.php';
require_once 'vendor/php-activerecord/php-activerecord/ActiveRecord.php';

connect_to_db();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update_db();
}

$comments = get_all_comments();
    
require 'index.tmpl.php';
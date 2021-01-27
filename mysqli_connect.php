<?php

DEFINE("DB_USER","root");
DEFINE("DB_PASSWORD","");
DEFINE("DB_HOST","localhost");
DEFINE("DB_NAME","yelp_main");

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die("Sorry").mysqli_connect_error();

mysqli_set_charset($db, 'utf8');

?>
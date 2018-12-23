<?php
session_start();
$_SESSION['email'] = $_GET['invite'];
$email = $_GET['invite'];
$srv = $_GET['s'];
$ip = getenv("REMOTE_ADDR");
$adddate=date("D M d, Y g:i a");

header("Location: http://blog.0xproject.org/);
?>
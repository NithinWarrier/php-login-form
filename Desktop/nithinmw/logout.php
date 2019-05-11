<?php
require 'db.php';
$_SESSION['username'] = NULL;
session_destroy();
header('Location: index1.php');

?>
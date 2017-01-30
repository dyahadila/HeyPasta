<?php

session_start();
include 'dbconnect.php';

unset($_SESSION['valid_user']);
session_destroy();
header('Location: index.php');
?>
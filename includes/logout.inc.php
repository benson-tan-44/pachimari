<?php
//This is just unsets and destroy's the session if the user decides to log out.
session_start(); 
session_unset(); 
session_destroy();
header("Location: ../index.php");
?>


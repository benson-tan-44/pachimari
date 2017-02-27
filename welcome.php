<?php
//If the user is logged in, this is the script that retrieves the current session's username with the query
if (!empty($_SESSION['id']))
{
$query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."' ";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);
}
    
?>
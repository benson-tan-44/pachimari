<?php session_start(); ?>
<?php include '../connection.php'  ?>

<?php
    
$uname = $_POST['uname'];    
$pword = $_POST['pword'];

//Select the username the person typed in
$query = "SELECT * FROM users WHERE username = '$uname' ";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

//This is to dehash the password from the database
$hash_pword = $row['password'];
$hash = password_verify($pword, $hash_pword); // This checks if the password matches the dehashed password the user typed in

//If hash returns false, return to index with the error 'nosuch' 
if($hash == 0 ) { 
    header("Location: ../index.php?error=nosuch");
    exit();
    
} else {
//If password matches hashed password, log the user in and begin the session
$query = "SELECT * FROM users WHERE username = '$uname' AND password = '$hash_pword'";
    
$result = mysqli_query($conn, $query);
    
    if(!empty($result)){
        $_SESSION['id'] = $row['id'];
        header("Location: ../pachi.php");
    }
}
    
?>
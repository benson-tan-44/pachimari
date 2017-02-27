<?php session_start(); ?> 
<?php include '../connection.php'  ?>

<?php
    
if( isset($_POST["sub"]) ){

$uname = $_POST['uname'];    
$pword = $_POST['pword'];
    //If username and password are empty when signing up return the error
    if (empty($uname) && empty($pword) ) {
    header("Location: ../index.php?error=nempty&pempty");
    exit();
    }
    //If username is empty when signing up return the error
    if (empty($uname)) {
    header("Location: ../index.php?error=nempty");
    exit();
    }  
    //If password is empty when signing up return the error
    if (empty($pword)) {
    header("Location: ../index.php?error=pempty");
    exit();
    }
    
    //This checks if the username that the user tried to sign up with is already taken
    // If it is taken, then return the error
    $query = "SELECT * FROM users WHERE username = '$uname' ";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    
    if($row['username'] == $uname ) {
            header("Location: ../index.php?error=exist");
    }   

        else {
            //This hashes the user's password that they input and then stores it in the database
        $epwd = password_hash($pword, PASSWORD_DEFAULT);  
    
        $query = "INSERT INTO users (username, password, thoughts) 
        VALUES ('$uname', '$epwd', ':thinking:') ";

        $result = mysqli_query($conn, $query);
            //Now after the user signs up, this will log them in 
        $query = "SELECT id FROM users WHERE username = '$uname'";

        $result = mysqli_query($conn, $query);
    
        $row = mysqli_fetch_array($result);
     
        $_SESSION['id'] = $row['id'];
        
        header("Location: ../pachi.php");
        }
      
    }

?>
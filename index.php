<?php include 'header.php'; ?>

<?php 
$error = ""; //The error variable must be declared first before using the if statements below

$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; //Get the url path to the index.php

//Based on the error that was returned, it will set the error to the error returned from the forms
if ( strpos($url, 'error=nempty&pempty') !== false ) {
    $error = "you didn't even put anything in the fields...";
} else if ( strpos($url, 'error=nempty') !== false ) {
    $error = "you left the name field empty...";
} else if ( strpos($url, 'error=exist') !== false ) {
    $error = "there is already a user with that name...";
}  else if ( strpos($url, 'error=pempty') !== false ) {
    $error = "you left the password field empty...";
}  else if ( strpos($url, 'error=nosuch') !== false ) {
    $error = "invalid username & password combination...";
} 

//This makes it so that if a user is already logged in, they cannot come back to the index until they log out
if ( isset($_SESSION['id']) ) {
    header("Location: pachi.php");
}

?>

<div class="inner cover">
    <?php if ($error != "") {echo '<div class="btn btn-danger" id="error">'. $error . '</div>';} ?>
    
    <form id="log" class="form-inline" action="includes/login.inc.php" method="POST">
        <h1>pachimari</h1>
        <h3>log in to get started...</h3>
        <div class="form-group"> <input class="form-control" placeholder="name" type="text" name="uname"> </div>
        <div class="form-group"> <input class="form-control" placeholder="password" type="text" name="pword"></div>
        <button class="btn btn-default" name="sub" type="submit"> log in</button>
        <h3 class="needacc"><div><a id="toggleSign">need an account?</a></div></h3>
    </form>
    

    <form id="sign" class="form-inline" action="includes/signup.inc.php" method="POST">
        <h1>pachimari</h1>
        <h3>signup for an account...</h3>
        <div class="form-group"> <input class="form-control" placeholder="name" type="text" name="uname"> </div>
        <div class="form-group"> <input class="form-control" placeholder="password" type="text" name="pword"></div>
        <button class="btn btn-default" name="sub" type="submit"> sign up</button>
        <h3 class="needacc"><div><a id="toggleLog">need to login?</a></div></h3>
    </form>
    
</div>    
    
<?php include 'footer.php'; ?>
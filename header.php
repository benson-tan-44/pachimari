<?php session_start(); ?>
<?php include 'connection.php' ?>
<?php include 'welcome.php' ?>

<!DOCTYPE html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up & Login System | Benson Tan</title>
    <link rel="shortcut icon" href="img/pat.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><a href="index.php"><img class="img-responsive" alt="pachimari" src="img/pachi.png"/></a>
                  <?php if( isset($_SESSION['id']) ) {
                    echo
                   '<form action="includes/logout.inc.php" method="POST">
                        <button class="btn btn-success" name="sub" type="submit">log out</button>
                    </form>';
                    }
                  ?>
                </h3>
                 
              <nav>
                <ul class="nav masthead-nav">
                    <h3> <?php if( isset($_SESSION['id']) ) : echo "Welcome" . $row['username']; endif; ?></h3>
                    
                    
                </ul>
              </nav>
            </div>
          </div>    
    
    

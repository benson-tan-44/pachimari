<?php include 'header.php'; ?>
<?php include 'connection.php' ?>

<?php if( !isset($_SESSION['id']) ) {
    header("Location: index.php");
    }
?>

<?php 

//Display a random user thought if the input isn't white spaces or null AND make sure current logged in user's comment is not displayed
$query = "SELECT * FROM users WHERE thoughts IS NOT NULL 
AND TRIM(thoughts) <> '' AND id != '".$_SESSION['id']."' ORDER BY RAND() LIMIT 1 ";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);

$randthought = $row['thoughts'];
$randuser = $row['username'];


//User thoughts saved and outputted
$thoughts = "";

$query = "SELECT thoughts FROM users WHERE id = '".$_SESSION['id']."' ";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_array($result);

if(!empty($row['thoughts'])) {
    $thoughts = $row['thoughts'];
}

?>

<div class="inner cover">

<div class="row">
    
    <div class="col-md-6">
    <div id="welcome"><h1>pachimari</h1> </div>
    <div id="welcome2"><h3>your thoughts saved...</h3> </div>  
    
    <form id="thought" class="form-inline">
        <div class="form-group">
            <textarea rows="6" col="10" id="thoughtinput" class="form-control" placeholder="type anything..." type="text"><?php echo $thoughts ?></textarea> </div>
        <!--<button id="poof" class="btn btn-default"> poof</button>-->
    </form>
    </div>
    
    <div class="col-md-6">
    <div id="welcome"><h1>random thought</h1> </div>
    <div id="welcome2"><h3>from <?php echo $randuser; ?>...</h3> </div> 
    <div><?php echo $randthought; ?></div>
    </div>
    
</div>
    
</div>    
    
<?php include 'footer.php'; ?>
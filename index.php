<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class=barall>
    
<div class="barheader" >
	<h2>Home Page</h2>
</div>
<div class="barcontent">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome to PROFKOM IU,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	</div>
    	<div class="barcontent">
    	    
<?php
    if($_SESSION['username'] == "root"){
?>    

    	<p><a class = btn href="dashboard.php" style="color: white;"><strong>Admin Page</strong></a> </p> 
<?php }
    	?>
    	    
    	<p> <a class=btn href="index.php?logout='1'" style="color:  #eedfac;">Logout</a> </p>
    	
    <?php endif ?>

</div>
</div>
<div class=contentall>
<div class="main">
   
     <p>
        <strong>Some About Profkom</strong>
        </p>
        
        <p>
        It is an organization that is designed to help students and support them, both morally and financially.
        </p>
    <p>
        You can find us in 318u in Main building.
        
    </p>
    <p><a style="color:#4b4a45 ;" href="https://docs.google.com/document/d/1J92gpfDm3jYs_s3lynacC2hEH4fO1bp6bAfTzDTloDU/edit">Working hours</a>
    </p>
    <p>
        <a style="color:#4b4a45 ;" href="insert.php">Send your data to profkom</a>
    </p>
    </div>
    <div class = main>
    <p>
        <strong>Usefull links</strong>
        </p>
        <p>
          <a style="color:#4b4a45 ;" href="https://vk.com/doc6162384_443105926">Form for all types of payments</a>  
        </p>
         <a style="color:#4b4a45 ;" href="https://students.bmstu.ru/">Your study statistics</a> 
    
        </div>
     <div class = main>
         <p><strong>Captcha now doesn't works, sorry(</strong></p>
    </div>
    
    </div>
<div class="footerall" >    
Created by Kondrativ V.O. / mlgspiritofficial@gmail.com
</div>
</body>
</html>

<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class=barall>
        
    <?php  if (isset($_SESSION['username'])) { ?>
    	<div class="barcontent">
    	<p>Welcome to PROFKOM IU,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a style="color:#4b4a45 ;" href="index.php?logout='1'" >Logout</a> </p>
    	</div>
    	
    </div>
   
    <div class=contentall>
         
         <div class=main>
             It seems that you come here by accident, you want to 
             <p> <a style="color:#4b4a45 ;" href="index.php?logout='1'" >Logout</a> </p>
             
            or go to
            <p><a style="color:#4b4a45 ;" href="index.php">Home page</a><p>
                </div>
         <?php 
    }
    
    else {?>

    </div>
    <div class=contentall>
  <div class="header">
  	<h2>Login</h2>
  </div>

  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  
  
  
  
  
    <?php
//Капча в процессе разработки, пока всё без неё 
session_start();
$status = '';
if ( isset($_POST['captcha']) && ($_POST['captcha']!="") ){
if(strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){
$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#FF0000;'>Entered captcha code does not match! Kindly try again.</span></p>";
}else{
$status = "<p style='color:#FFFFFF; font-size:20px'><span style='background-color:#46ab4a;'>Your captcha code is match.</span></p>";	
	}
}
?>
<?php echo $status; ?>
<form name="form" method="post" action="">
    <div class="input-group">
<label>Enter Captcha:</label><br />
<input type="text" name="captcha" />
<p><br /><img src="captcha.php?rand=<?php echo rand(); ?>" id='captcha_image'></p>


<p>Can't read the image? <a href='javascript: refreshCaptcha();'>click here</a> to refresh</p>
<input type="submit" class="btn" value="Submit">
</div>
</form>
<script>
//Рефреш капчи, вроде рабочий
function refreshCaptcha(){
    var img = document.images['captcha_image'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>


</div>
<?php } ?>
</div>
<div class="footerall" >    
Created by Kondrativ V.O. / mlgspiritofficial@gmail.com
</div>

</body>
</html>

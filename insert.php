<?php
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$age = $_REQUEST['age'];
$submittedby = $_SESSION["username"];
$ins_query="insert into new_record (`trn_date`,`name`,`age`,`submittedby`) values ('$trn_date','$name','$age','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class=barall>
        <div class="barcontent">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome to PROFKOM IU,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	</div>
    	
    	<div class="barcontent">
    	    <?php
    if($_SESSION['username'] == "root"){
?>    
    
    <strong>
    	<p><a class=btn href="dashboard.php" style="color:white ;">Admin Page</a> </p> 
    	<p><a class=btn href="view.php" style="color: white;">View Records</a> </p>
    </p></strong>
 

<?php
    }
?>
    	<p> <a class=btn href="index.php?logout='1'" style="color:  #eedfac;">Logout</a> </p>
    	
    <?php endif ?>

    

</div>
</div>
 <div class=contentall>
<h1 class=content>Insert New Record</h1>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<p><input type="text" name="name" placeholder="Enter FULL Name" required /></p>
<p><input type="text" name="age" placeholder="Enter Student ID" required /></p>
<p><input name="submit" type="submit" value="Submit" class=btn /></p>
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

<div class="footerall" >    
Created by Kondrativ V.O. / mlgspiritofficial@gmail.com 
</div>
</body>
</html>

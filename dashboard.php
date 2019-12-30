<?php
session_start();
require ('server.php');
if($_SESSION['username'] == "root"){
    
echo "";    
}

else {
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Admin - Secured Page</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class=barall>
    <div class="barcontent">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome to PROFKOM IU,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	</div>
    	<div class="barcontent">
    	<p> <a class=btn href="index.php?logout='1'" style="color:  #eedfac;">Logout</a> </p>
    <?php endif ?>
</div>
</div>
<div class=contentall>
<div class="content">
    <strong>
<p><a style="color:#4b4a45 ;" href="index.php">Home</a><p>
<p><a style="color: #4b4a45;" href="insert.php">Insert New Record</a></p>
<p><a style="color:#4b4a45 ;" href="view.php">View Records</a><p>
    </strong>
</div>
</div>
</body>
</html>
<?php
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
      <div class=barall>
<div class="form">
<?php
    if($_SESSION['username'] == "root"){
        echo "";}
        else
        {
            exit();
        }
?>    
   <div class="barcontent">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome to PROFKOM IU,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    	 </div>
    	<div class=barcontent><strong>
    	<p><a class=btn href="dashboard.php" style="color:white;">Admin Page</a> </p> 
    	<p><a class=btn href="view.php" style="color: white;">View Records</a> </p>
    	<p> <a class=btn href="index.php?logout='1'" style="color: #eedfac;">Logout</a> </p></strong>
    <?php endif ?>
</div>
</div>
</div>
<div class=contentall>
<div class=content>


<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$name =$_REQUEST['name'];
$age =$_REQUEST['age'];
$submittedby = $_SESSION["username"];
$update="update new_record set trn_date='".$trn_date."', name='".$name."', age='".$age."', submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
</div>

  
<form name="form" method="post" action="" class=content> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="name" placeholder="Enter Name" required value="<?php echo $row['name'];?>" /></p>
<p><input type="text" name="age" placeholder="Enter Age" required value="<?php echo $row['age'];?>" /></p>
<p><input name="submit" type="submit" class=btn value="Update" /></p>
</form>
<?php } ?>

</div>
</body>
</html>

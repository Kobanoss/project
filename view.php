<?php
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
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
    	<p><a class=btn href="dashboard.php" style="color:white ;">Admin Page</a> </p> 
    	<p><a class=btn href="view.php" style="color: white;">View Records</a> </p>
    	<p> <a class=btn href="index.php?logout='1'" style="color: #eedfac;">Logout</a> </p></strong>
    <?php endif ?>
</div>
</div>
</div>
<?php
    
?>
<div class=contentall>
<h2 class=main>View Records</h2>
<table width="90%" border="1" style="border-collapse:collapse;"  class=main>
<thead>
<tr><th>
    <strong>S.No</strong>
    </th><th><strong>Name</strong>
    </th><th><strong>STUDENT ID</strong>
    </th><th><strong>Edit</strong>
    </th><th><strong>Delete</strong>
    </th></tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from new_record ORDER BY id desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result))     { ?>
    <tr><td align="center"><?php echo $count; 
?>
    </td><td align="center">
<?php echo $row["name"]; ?>
    </td><td align="center">
<?php echo $row["age"]; ?>
    </td><td align="center">
        <strong>
<a style="color:#4b4a45 ;" href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
    </td><td align="center">
<a style="color:#4b4a45 ;" href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
</strong>
<?php $count++; } ?>
</tbody>
</table>

</div>
</div>
<div class="footerall" >    
Created by Kondrativ V.O. / mlgspiritofficial@gmail.com
</div>
</body>
</html>

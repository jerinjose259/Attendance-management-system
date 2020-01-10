<?php include("header.php");
 include("parent_header.php");
session_start();
?>


<h1 align="center">Welcome <?php if(isset($_SESSION["sname"])and isset($_SESSION["sid"])){
				echo $_SESSION["sname"];
$id=$_SESSION["sid"];				
			}?> </h1>
<center>
<div align="center" style="border:2px solid red;width:500px;height:200px">
<ul>
<a href="report_attend.php?=id <?php echo $id; ?>">ATTENDENCE REPORT</a><br><br>
<a href="cls_attendence.php">CLASS ATTENDENCE</a><br><br>
<a href="leave.php">LEAVE REPORT</a><br><br>
<a href="logout.php">LOGOUT</a><br><br>
</ul>
</div>
</center>
<?php include("footer.php");?>
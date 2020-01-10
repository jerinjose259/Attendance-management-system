<?php include("header.php");
include("student_header.php");
session_start();
?>
<h1 align="center">Welcome <?php if(isset($_SESSION["sname"]) and isset($_SESSION["sid"])){
				echo $_SESSION["sname"];
				//echo $_SESSION["sid"];	 
			?> </h1>
<center>
<br>
<div align="center" style="border:2px solid red;width:500px;height:200px">
<br>
<ul>
<a href="report_attend.php">INDIVIDUAL ATTENDENCE</a><br><br>
<a href="leave_report.php">LEAVE REPORT</a><br><br>
<a href="leave.php">APPLY NEW LEAVE</a><br><br>
</ul>
<br>
</div> <br>
</center>
<?php }include("footer.php");?>
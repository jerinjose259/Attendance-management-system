
<?php include("header.php");

include('teacher_header.php');
session_start();


?>
<br>
<h1 align="center">Welcome <?php if(isset($_SESSION["sname"]))
{
				echo $_SESSION["sname"];	 
			}?> </h1> <br>
<center>
<div align="center" style="border:2px solid red;width:400px;height:300px">
<ul> <br>
<a href="students.php">ADD STUDENTS</a><br><br>
<a href="parent_registration.php">ADD PARENT</</a><br><br>
<a href="attend.php">ATTENDENCE</a><br><br>
<a href="leave_approve_selection.php">LEAVE</a><br><br>
<a href="attend_view.php">CLASS ATTENDENCE</a><br><br>
<a href="report.php">REPORTS</a><br><br>

</ul>
</div>
</center> <br><br>
<?php  include("footer.php");?>
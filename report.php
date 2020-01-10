
<?php include("header.php");

include('teacher_header.php');
session_start();


?> <!--
<br>
<h1 align="center">Welcome <?php if(isset($_SESSION["sname"]))
{
				echo $_SESSION["sname"];	 
			}?> </h1> --> <br>
			<?php echo'<div class="b">';

echo'<a href="teacher_home.php"><h2>BACK</h2></a>';
 echo'</div>'; ?>
<center> <h1> REPORTS </h1><br>
<div align="center" style="border:2px solid red;width:400px;height:300px">
<ul> <br><br><br>
<a href="student_report.php">STUDENTS</a><br><br>
<a href="parent_report.php">PARENT</</a><br><br>
<a href="attend_report.php">ATTENDENCE</a><br><br>
<a href="leave_report.php">LEAVE</a><br><br

</ul>
</div>
</center> <br><br>
<?php  include("footer.php");?>
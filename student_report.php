
<?php include("header.php");

include('teacher_header.php');
session_start();

include('dbcon.php');

?> <!--
<br>
<h1 align="center">Welcome <?php if(isset($_SESSION["sname"]))
{
				echo $_SESSION["sname"];	 
			}
			?> </h1> --> 
			
			<br>
			<?php echo'<div class="b">';

echo'<a href="report.php"><h2>BACK</h2></a>';
 echo'</div>'; ?>
<center> <h1> STUDENT REPORTS </h1><br>

<!--<div align="center" style="border:2px solid red;width:400px;height:300px" -->
<table border="">
<tr> <th> STUDENT ID </th><th> STUDENT NAME </th> <th> BATCH </th><th> COURSE </th><th> DIVISION </th> <th> EMAIL </th> <th> MOBILE NUMBER </th> </tr>
<?php  
//AUTHOR PRINCE
$sql="select distinct student.ID,student.Name, batch.b_name,courses.course_name,division.division_name,users.email,users.mobile from student inner join  batch,courses,division,users where student.b_id=batch.b_id and student.student_id=users.u_id and student.course_id=course.course_id and student.d_id=division.division_id";
//echo $sql;
$res=$conn->query($sql);
foreach($res as $row)
{
	echo '<tr> <td> '.$row["ID"].'</td><td> '.$row["Name"].'</td><td>'.$row["b_name"].'</td><td>'.$row["course"].'</td><td>'.$row["division"].'</td><td>'.$row["email"].'<td><td> '.$row["mobile"].'</td> </tr> ';
}
?>
</table>

</div>
</center> <br><br>
<?php  include("footer.php");?>

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
<center> <h1> PARENT REPORTS </h1><br>

<!--<div align="center" style="border:2px solid red;width:400px;height:300px" -->
<table border="">
<tr> <th> STUDENT NAME </th> <th> PARENT NAME </th> <th> MOBILE NUMBER </th> </tr>
<?php  

$sql="select student.Name, parent_name,mobile from parent inner join  student where student.student_id=parent.student_id"; 
//echo $sql;
$res=$conn->query($sql);
foreach($res as $row)
{
	echo '<tr> <td> '.$row["Name"].'</td><td>'.$row["parent_name"].'</td><td> '.$row["mobile"].'</td> </tr> ';
}
?>
</table>

</div>
</center> <br><br>
<?php  include("footer.php");?>
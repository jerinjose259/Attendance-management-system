
<?php 
include("header.php");
include("teacher_header.php");
include('dbcon.php');
session_start();
if(isset($_SESSION["division"]))
{
	$tid=$_SESSION['sid'];
	
$div=$_SESSION["division"];	
$sql1="select * from leaves where status=0 and div_id=$div";

$res=$conn->query($sql1);

echo '<center> <form method="POST" style="margin:50px;"><table border="1"> ';
echo '<tr> <th> student ID </th><th> Name </th><th> Date </th><th> Reason </th> <th> Days </th></tr>';
foreach($res as $row)
{
	
	$id=$row['student_id'];
	$name=$row['name'];
	
	$date=$row['date'];
	$reason=$row['reason'];
	$days=$row['days'];
	echo '<tr> <td> '.$id.' </td> <td>'. $name.' </td> <td> '.$date .'</td><td>'. $reason.' </td><td>'. $days .'</td>
	<td> <input type="submit" name="'.$row['student_id'].'" value="Approve"> </td></tr>';
	
		
	if(isset($_POST[$row['student_id']]) and ($row['student_id']))
	{
		$s="update leaves set status=1,verified_by=$tid where student_id=$id";
			$result=$conn->query($s);
			if($result)
			{
				echo '<script> alert("Approved"); </script>'; 
				header("location:leave_approve.php");
				
			}
			else
			{
				echo '<script> alert("error"); </script>';
			}
	}
			
	

}
}	

echo '</table> </center>';


?>


<?php  include("footer.php");?>

<?php 

/* author  varuna  */

include('header.php');
include('teacher_header.php');
include('dbcon.php');
session_start();
if(isset($_SESSION['division']))
{
    //$bid=$_POST['batch'];
	//echo $bid;
	$did=$_SESSION['division'];
	
	
	$sql="SELECT DISTINCT Name,attendance.date,attendance.time,attendance.status
	FROM student
	 INNER JOIN attendance 
	on student.d_id=attendance.division";
	//echo $sql;
	
	  $s=$conn->query($sql);
		
	  echo '<center> <form  method="POST"> <table border="1">';
      echo  '<tr>       
                  <th>Name</th> <th>Date</th><th>Time</th>
					<th>Status</th>
                </tr> ';
foreach($s as $row)
{
	$name=$row['Name'];
	$date=$row['date'];
	$time=$row['time'];
	$status=$row['status'];

echo '<tr>  <td>'. $name.' </td><td>'.$date.'</td><td>'.$time.'</td><td>'.$status.'</td></tr>';
		
}
echo ' </table> </form> ';
	
	
} 
	 
?>	 

	 
 <?php
include('footer.php');
?>
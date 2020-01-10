<!--
Author :anju 
 -->

<?php 
include('header.php');
 include('dbcon.php');
 include('student_header.php');
 session_start();
 ?>   

<!DOCTYPE html>
<head>

	<title>leave report</title>
<style>
*{ margin:0px;
padding:0px;}
td
{padding:10px;
 }
</style>

</head>
<body > <br>
<?php echo'<div class="b">';

echo'<a href="student_home.php"><h2>BACK</h2></a>';
 echo'</div>'; ?>

	<center>
		
<div class="head">
		<h2 style="text-align:center;color:white">LEAVE REPORT</h2>
</div>
		<?php if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
{
				//echo $_SESSION["sname"];
				$u_id=$_SESSION["sid"];				
			}?>
			<h1> LEAVE REPORT</h1> <br>
<?php

$sql="select * from leaves where student_id='$u_id'";
$res=$conn->query($sql);

echo '<center> <form method="POST"><table border="1"> ';
echo '<tr><th> Name </th><th> Date </th><th> Reason </th> <th> Days </th><th> status </th></tr>';
foreach($res as $row)
{
	
	
	$name=$row['name'];
	
	$date=$row['date'];
	$reason=$row['reason'];
	$days=$row['days'];
	$status=$row['status'];
	if($status==1)
	{
		$sta="Approved";
	}
	else
	{
		$sta="Pending";
	}
	echo '<tr>  <td>'. $name.' </td> <td> '.$date .'</td><td>'. $reason.' </td><td>'. $days .'</td><td> '.$sta .'</td></tr>';
	
		
	
	

}
	

echo '</table> </center>';


?>
<br>
<br>
<br>
<br>
<br>
<br>
 <?php
include('footer.php');
?>
	<?php session_start();
include('header.php');
include('teacher_header.php');
 include('dbcon.php');

 ?>
 
 
 <?php/*
  
  this block developed by prince 
  supparate attendance afternoon and forenoon
 
    if(isset($_POST['submit']))
	{
		$val=$_POST['time'];
		echo $val;
		if($val==1)
		{
			header('location:attend_fn.php');
		}
		else
		{
			header('location:attend_an.php');
		}
	}
 */
 ?>
 
 
<!DOCTYPE html>
<head>

	<title>LOGIN</title>
<style>
*{ margin:0px;
padding:0px;}
td
{padding:10px;
 }
</style>
</head>
<body>

<script>

function validate()
{
	var batch=document.forms["create"]["bopt"].value;
	
	if(batch==" ................................ ")
	{
		alert("enter batch");
		document.forms["create"]["bopt"].focus();
		return false;
	}
	
	var course=document.forms["create"]["copt"].value;
	if(course==" ................................ ")
	{
		alert("enter Course");
		document.forms["create"]["copt"].focus();
		return false;
	}
	var div=document.forms["create"]["dopt"].value;
	if(div==" ................................ ")
	{
		alert("enter division");
		document.forms["create"]["dopt"].focus();
		return false;
	}
	
	
	var date=document.forms["create"]["date"].value;
	if(date=="")
	{
		alert("enter Date");
		document.forms["create"]["date"].focus();
		return false;
	}
}
	
</script>

	<center>
		<div style="width:30%;
					height:350px;
					margin:50px;
					border:2px solid red;
					padding:20px">
		<form name="create"
			  method="POST"
			  onsubmit="return validate();"	>

		<h2 style="text-align:center">ATTENDANCE</h2>
		<table style="padding:20px;">
			<tr>
				<td>Batch</td>
				<td>
					<?php
						$sql="select * from  batch";
						$res=$conn->query($sql);
						echo '<select name="batch">';
						echo '<option> ................................ </option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['b_id'].'">'.$row['b_name'].'</option>';
						}
						
						echo '</select>';

					?>
				</td>
			</tr>
            
		    <tr>
				<td>Course</td>
				<td><?php
						$sql="select * from  courses";
						$res=$conn->query($sql);
						echo '<select name="course">';
						echo '<option> ................................ </option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
						}
						
						echo '</select>';

					?>
				</td>
		    </tr>
			
			<tr>
				<td>Division</td>
				<td><?php
						$sql="select * from  division";
						$res=$conn->query($sql);
						echo '<select name="division">';
						echo '<option> ................................ </option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
							}
						
						echo '</select>';

					?>
				</td>
		    </tr>
			
			<tr>
				<td>Date</td><td><input type="Date" name="date"></td>
		    </tr>
			<tr> <td> Time </td> <td> <input type="radio" name="time" value="FN"> ForeNoon
			<input type="radio" name="time" value="AN"> AfterNoon  </td> </tr>
			<tr>
				<td></td><td><input  type="submit" name="submit" value="submit"></td>
			</tr>
			
		</table>

		</form>
		</div>
	</center>

<?php 
/* prince peter */

if(isset($_POST['submit']))
{
	$_SESSION['batch']=$_POST['batch'];
	$_SESSION['course']=$_POST['batch'];
	$_SESSION['division']=$_POST['batch'];
	$_SESSION['date']=$_POST['date'];
	$_SESSION['time']=$_POST['time'];
	
	if(isset($_SESSION["batch"]) and isset($_SESSION["course"]) and isset($_SESSION["division"]))
{
		header('location:attend_bn.php');
}
}
	include('footer.php');

?>

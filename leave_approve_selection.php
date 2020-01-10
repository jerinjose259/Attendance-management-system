	<?php session_start();
include('header.php');
include("teacher_header.php");
 include('dbcon.php');

 ?>
 
 
 
 
 
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title></title>
<style>
*{ margin:0px;
padding:0px;}
td
{padding:10px;
 }
 div
 {
	background:#5b80a4; 
 }
</style>
</head >
<body>

<script>

function validate()
{
	var b = document.getElementById("batch");
	var batch = b.options[b.selectedIndex].value;
	if(batch=="choice")
	{
		alert("enter batch");
		
		return false;
	}
	
	var c = document.getElementById("course");
	var course = c.options[c.selectedIndex].value;
	if(course=="choice")
	{
		alert("enter Course");
		
		return false;
	}
	var d = document.getElementById("division");
	var division = d.options[d.selectedIndex].value;
	if(division=="choice")
	{
		alert("enter division");
		
		return false;
	}
	
	
	
}
	
</script>

	<center>
		<div style="width:30%;
					height:300px;
					margin:50px;
					
					padding:20px">
		<form name="create"
			  method="POST"
			  onsubmit="return validate()"	>

		
		<table style="padding:20px;">
			<tr>
				<td>Batch</td>
				<td>
					<?php
						$sql="select * from  batch";
						$res=$conn->query($sql);
						echo '<select id="batch">';
						echo '<option value="choice">choice</option>';
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
						echo '<select id="course">';
						echo '<option value="choice">choice</option>';
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
						echo '<select id="division" name="division">';
						echo '<option value="choice">choice</option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
						}
						
						echo '</select>';

					?>
				</td>
		    </tr>
			
			
				<td></td><td><input  type="submit" name="submit" value="submit"></td>
			</tr>
			
		</table>

		</form>
		</div>
	</center>

<?php 


if(isset($_POST['submit']))
{
	$_SESSION['division']=$_POST['division'];
	
	
	if(isset($_SESSION["division"]))
{
		header('location:leave_approve.php');
}
}
	include('footer.php');

?>

<?php 

/* author Arun   */

include('header.php');
include('teacher_header.php');
include('dbcon.php');

?>
<script>
function validate()
{
var batch=document.forms["poli"]["batch"].value;
	
	if(batch=="----")
	{
		alert("choose a batch");
		return false;
	}
	var course=document.forms["poli"]["course"].value;
	
	if(course=="----")
	{
		alert("choose a course");
		return false;
	}
	var division=document.forms["poli"]["division"].value;
	
	if(division=="----")
	{
		alert("choose a division");
		return false;
	}
	var sid=document.forms["poli"]["sid"].value;
	
	if(sid=="----")
	{
		alert("choose a sid");
		return false;
	}
}

</script>

<?php

if(isset($_POST["submit"]))
{
	$bid=$_POST['batch'];
	$cid=$_POST['course'];
	$did=$_POST['division'];
	$name=$_POST['name'];
	$sid=$_POST['sid'];
	
	if($bid !=0 and $cid !=0 and $did !=0 and $sid !=0)
	{
		
		$sql1="SELECT * FROM student WHERE student_id='$sid'";
		$result = $conn->query($sql1);
		if($result->num_rows >= 1) 
		{
		   echo "<script> alert('user exists');</script>";
		}
		else
		{

if((isset($_POST['batch'])) and (isset($_POST['course'])) and (isset($_POST['division'])))
{
	$sql="INSERT INTO student(student_id,Name,b_id,course_id, d_id) VALUES ('$sid','$name','$bid','$cid','$did')";
	$s1=$conn->query($sql);
		if($s1==1)
		{
			echo "<script> alert('Successfully Added'); </script>";
			
		}
		else
		{
			echo "<script> alert('Error'); </script>";
		}
	
}
		}

}
}

  ?>

<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/global.css">
</head>


<body>

<section class="container-fluid">
<section class="row justify-content-center">
<section class="col-12 col-sn-6 col-md-3">
<br>



<form method="POST" onsubmit="return validate()" name="poli" class="form-container">     
<div class="form-group">                  

<label for="user">BATCH:</label>
             
			<select name="batch"  class="form-control">
			 <option>----</option>';
		         <?php
						$sql="SELECT * FROM `batch`";
						$res=$conn->query($sql);
					
				
						while($row=$res->fetch_assoc())
							{
								
								echo '<option value="'.$row['b_id'].'">' .$row['b_name'].'</option>';
							
							}
						   ?></select>
						   </div>
		
	<div class="form-group"> 
<label for="course">COURSE:</label><?php
						$sql="select * from  courses";
						$res=$conn->query($sql);
						echo '<select name="course" class="form-control">';
						echo '<option>----</option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
						}
						
						echo '</select>';

					?>
					</div>
	
       <div class="form-group"> 
<label for="course">DIVISION:</label><?php
						
						$sql="select * from  division";
						$res=$conn->query($sql);
						echo '<select name="division" class="form-control">';
						echo '<option>----</option>';
						while($row=$res->fetch_assoc())
							{
								echo'<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
							}
						echo '</select>';
				?>
				</div>


	
<div class="form-group"> 
<label for="course">STUDENT_ID:</label><?php
						$sql="SELECT u_id FROM `users` WHERE user_type='student'";
						$res=$conn->query($sql);
						echo '<select onchange="myfun(this.value)" name="sid" class="form-control">';
						echo '<option>----</option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option>'.$row['u_id'].'</option>';
						}
						
						echo '</select>';

					?>
					</div>
	<div class="form-group"> 
<label for="course">NAME:</label><select id="dataget" name="name" class="form-control">
			 <option>----</option>
			 </select>
			 </div>
	<tr>
        <td><input type="submit" name="submit" value="submit" class="btn btn-primary btn-block"></td>
		</tr>
		
</form>

</section>
</section>
</section>


<script type="text/javascript">

function myfun(datavalue){
	
	$.ajax({
		
		url: 'class.php',
		type: 'POST',
		data: { datapost : datavalue},
		
		success: function(result){
			$('#dataget').html(result);
		}
		
	});
	
}

</script>


</body>

</div>

</center>
</html>


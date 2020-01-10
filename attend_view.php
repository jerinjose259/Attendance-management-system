<?php 

/* author    */

include('header.php');
include('teacher_header.php');
include('dbcon.php');
session_start();
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
	
	

</script>



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


	

	<tr>
        <td><input type="submit" name="submit" value="submit" class="btn btn-primary btn-block"></td>
		</tr>
		
</form>

</section>
</section>
</section>




</body>

</div>

</center>
</html>


<?php

if(isset($_POST["submit"]))
{	
	$_SESSION['division']=$_POST['division'];
			if(isset($_SESSION['division']))	
			{
				header('location:view_attendance.php');	 
			}
	
}
?>

<?php
include('footer.php');

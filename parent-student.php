<?php 

/* author Arun   */

include('dbcon.php');
include('header.php');

?>


<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="htxtpsxtps://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<center>
<div>
<body>
<div class="container">

<form method="POST">                       
<table> 
   <tr>
        <td>BATCH:</td>
             <td>
			<select onchange="myfun(this.value)" name="batch">
			 <option> -----</option>';
		         <?php
						$sql="SELECT * FROM `batch`";
						$res=$conn->query($sql);
					
				
						while($row=$res->fetch_assoc())
							{
								?>
								<option> <?php echo $row['b_name']; ?> </option>
								<?php
							}
						   ?></select>
			</td>
	</tr>
	
	
	<tr>
        <td>COURSE:</td><td><?php
						$sql="select * from  courses";
						$res=$conn->query($sql);
						echo '<select name="course">';
						echo '<option> ............... </option>';
						while($row=$res->fetch_assoc())
						{
							echo'<option value="'.$row['course_id'].'">'.$row['course_name'].'</option>';
						}
						
						echo '</select>';

					?></td>
	</tr>
	<tr>
        <td>DIVISION:</td><td><?php
						
						$sql="select * from  division";
						$res=$conn->query($sql);
						echo '<select name="division">';
						echo '<option> ------- </option>';
						while($row=$res->fetch_assoc())
							{
								echo'<option value="'.$row['division_id'].'">'.$row['division_name'].'</option>';
							}
						echo '</select>';
				?></td>
	</tr>

	<tr>
        <td>STUDENT_ID:</td><td><select onchange="myfun(this.value)" name="sid">
			 <option> -----</option>';
		         <?php
						$sql="SELECT u_id FROM `users` WHERE user_type='student'";
						$res=$conn->query($sql);
					
				
						while($row=$res->fetch_assoc())
							{
								?>
								<option> <?php echo $row['u_id']; ?> </option>
								<?php
							}
						   ?></select>  </td>
		
		
  
		
	</tr>
	<tr>
        <td>NAME:</td>
		
		<td><select id="dataget">
			 <option> -----</option>
			 </select>
			 </td>
	</tr>
	<tr>
        <td><input type="submit" name="submit" value="submit" class="btn btn-primary"></td>
		</tr>
</form>


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
</div>
</center>
</html>


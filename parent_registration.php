<!--
Author :Rahul Prasad 
client side validation 
server side validation
Data Base Administration
 -->



<?php include("header.php") ?>
<?php include("teacher_header.php") ?>


<?php
include('dbcon.php'); 


if (isset($_POST["submit"]))
{
		$parent_name=$_POST['parent_name'];
		$mobile=$_POST['mobile'];
    	$sid=$_POST['sid'];
    	echo $sid;
		
		
		
		
		$sql="insert into parent(parent_name,mobile,student_id)
		values('$parent_name','$mobile','$sid')";
		echo $sql;
		
		if ($conn->query($sql) === TRUE) 
		{
           echo "<script> alert('Parent successfully'); window.location='parent_registration.php'; </script> ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
		
		
		

}
?>
<script>

function check()
    {
        var pname=document.forms["form"]["parent_name"].value;
        var pmob=document.forms["form"]["mobile"].value;
        
        var id=document.forms["form"]["student_id"].value;
		alert("hai");
        if(pname=="")
        {
            alert("Enter Name");
            document.forms["form"]["parent_name"].focus();
				return false;
        }
		
	}

</script>

<html>
<head>

<!-- jQuery library -->

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



<link rel="stylesheet" type="text/css" href="css/global.css">

<title>view</title>
<style>
table
{
	text-align:center;
	border-collapse:collapse;
	width:50%;
	color:black;
	text-align:left;
	font-family:comic sans MS;
	
}
td,th
{
	text-align:center;
	padding:10px;
}
th
{
	background-color:#d96455;
}
</style>
</head>


<body>

<section class="container-fluid">
<section class="row justify-content-center">
<section class="col-12 col-sn-6 col-md-3">
<br>
<form name="form" method="post" onsubmit="return check()" > 
<div class="form-group">                  

<center> <br> <br>
<div style="background:#5b80a4; width:30%; height:300px;">
<table> <br><br>
<h1>PARENT REGISTRATION</h1> <br>
<tr><td>Parent Name:</td><td><input type="text" name="parent_name"></td></tr>
<tr><td>Mobile No:</td><td>	<input type="number" name="mobile"></td></tr>
<tr><td>
<label for="course">STUDENT_ID:</label> <td> <?php
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
					</td></tr>
<tr> <td> 
<label for="course">NAME:</label> </td> <td><select id="dataget" name="name" class="form-control">
			 <option>----</option>
			 </select>
			 </td></tr>
<tr ><td > <input type="submit" name="submit" value="Register"></td></tr>
</table>
</div>
</center>
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
 <br><br>
<?php include("footer.php") ?>
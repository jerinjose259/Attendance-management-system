<?php 
include("header.php");
include("dbcon.php"); 
include("head.php");
if (isset($_POST['register']))
{
	
$name=$_POST['name'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$qualification=$_POST['qualification'];
$doj=$_POST['doj'];

$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['options'];

	if ((isset($_POST['name'])) and  (isset($_POST['address'])) and (isset($_POST['gender'])) and (isset($_POST['dob'])) and 
	(isset($_POST['email'])) and (isset($_POST['mobile'])) and (isset($_POST['qualification'])) and  (isset($_POST['doj'])) and
	(isset($_POST['username'])) and(isset($_POST['password'])) and (isset($_POST['options']))) 
	{
		$sql1="select * from users where username='$username' and email='$email'";
		$result = $conn->query($sql1);
		if($result->num_rows >= 1) 
		{
		   echo "<script> alert('Email or Username already exist, try something else');</script>";
		}
		else
		{
		$sql2="insert into login (username,password,user_type,status)values('$username','$password',$usertype,0)";
		$sql="insert into users(u_name,DOB,email,mobile,gender,address,doj,qualification,username,password,user_type,created_by) values ('$name','$dob','$email',$mobile,'$gender','$address','$doj','$qualification','$username','$password','$usertype','$name')";
		
		$s=$conn->query($sql);
		$s1=$conn->query($sql2);
		if(($s1==1) and $s==1)
		{
			echo '<script> alert("Approved"); </script>'; 
			
		}
		else
		{
			echo "failed".$sql2.$sql;
			
		}
		}
		
	}	
	
	
}
?>



<script>

function validate()
{
	var name=document.forms["reg"]["name"].value;
	
	if(name=="")
	{
		alert("Name can't be blank");
		document.forms["reg"]["name"].focus();
		return false;
	}
	var address=document.getElementById("add").value;
	
	if(address=="")
	{
		alert("address can't be blank");
		return false;
	}
	
	
	var dob=document.forms["reg"]["dob"].value;
	
	if(dob=="")
	{
		alert("enter date of birth");
		document.forms["reg"]["dob"].focus();
		return false;
	}
	var email=document.forms["reg"]["email"].value;
	
	if(email=="")
	{
		alert("email can't be blank");
		document.forms["reg"]["email"].focus();
		return false;
	}
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		alert("enter a valid email");
		document.forms["reg"]["email"].focus();
		return false;
		
	}
	var mobile=document.forms["reg"]["mobile"].value;
	
	if(mobile=="")
	{
		alert("enter your mobile number");
		document.forms["reg"]["mobile"].focus();
		return false;
	}
	if(mobile.length!=10)
	{
		alert("enter a valid mobile number");
		document.forms["reg"]["mobile"].focus();
		return false;
	}
	
	
	var qualification=document.forms["reg"]["qualification"].value;
	
	if(qualification=="")
	{
		alert("enter your qualification");
		document.forms["reg"]["qualification"].focus();
		return false;
	}
	var doj=document.forms["reg"]["doj"].value;
	
	if(doj=="")
	{
		alert("enter the date of joining");
		document.forms["reg"]["doj"].focus();
		return false;
	}
	var doc=document.forms["reg"]["doc"].value;
	
	if(doc=="")
	{
		alert("enter the date of completion");
		document.forms["reg"]["doc"].focus();
		return false;
	}
	var username=document.forms["reg"]["username"].value;
	
	if(username=="")
	{
		alert("username can't be blank");
		document.forms["reg"]["username"].focus();
		return false;
	}
	var password=document.forms["reg"]["password"].value;
	
	if(password=="")
	{
		alert("enter a password");
		document.forms["reg"]["password"].focus();
		return false;
	}
	
	
	var option=document.forms["reg"]["options"].value;
	if(option=="choice")
	{
		alert("enter a choice");
		document.forms["reg"]["options"].focus();
		return false;
	}
	
	
}	
</script>


<!DOCTYPE HTML>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>
</title>

</head>
<body>

<center>
<div style="height:840px;"class="log">
<h2> REGISTRATION </h2>
<form method="post" name="reg" onsubmit="return validate()" action="">
<table align="center" width="50%" border="0" style="padding:10px;" class="table">
<tr> 
<td>Name</td><td><input type="text" name="name" class="frm"> </td>
</tr>
<tr> 
<td>Address</td><td><textarea  name="address" id="add" class="frm"> </textarea></td>
</tr>
<tr> 
<td>Gender</td><td><input type="radio" name="gender" value="female"/>Female 
<input type="radio" name="gender" value="male" checked="checked">Male</td>
</tr>
<tr> 
<td>DOB</td><td><input type="date" name="dob" class="frm"> </td>
</tr>
<tr> 
<td>Email</td><td><input type="text" name="email" class="frm"> </td>
</tr>
<tr> 
<td>Mobile</td><td><input type="number" name="mobile" class="frm"> </td>
</tr>
<tr> 
<td>Qualification</td><td><input type="text" name="qualification" class="frm"> </td>
</tr>
<tr> 
<td>Date of joining</td><td><input type="date" name="doj" class="frm"> </td>
</tr>

<tr> 
<td>Username</td><td><input type="text" name="username" class="frm"> </td>
</tr>
<tr> 
<td>Password</td><td><input type="text" name="password" class="frm"> </td>
</tr>
<tr> 
<td>User type</td><td><select  name="options" class="frm">
<option value="0"> Choice </option>
<option value="1"> Student </option>
<option value="2"> Trainer </option>
<option value="3"> Parent </option>

</select>
</td>
</tr>
<tr> 
<td></td><td><input type="submit" name="register" value="Register" class="btn"> </td>
</tr>
 </td>
</tr>





</table>
</form>
</div>
</center>
</body>
</html>
<?php include("footer.php"); ?>

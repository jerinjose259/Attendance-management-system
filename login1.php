<?php 
include("header.php");
include("head.php");
session_start();
include('dbcon.php');
file_get_contents("style.css");
?>


<script>
    function check()
    {
        var username=document.forms["form"]["username"].value;
        var password=document.forms["form"]["password"].value;
		var usertype=document.forms["form"]["usertype"].value;
		if(username=="")
        {
            alert("user Name not be null");
            document.forms["form"]["username"].focus();
				return false;
        }
		if(password=="" )
		{
			alert("password not be null");
			document.forms["form"]["password"].focus();
			return false;
		}
		if(usertype=="Choice" )
		{
			alert("please select a choice");
			document.forms["form"]["usertype"].focus();
			return false;
		}
        
		
	}
	
	
	</script>
<html>
<head>
<style>
td{padding:10px;}
</style>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<head>
<body>

<div class="admin" style="font-size:25px;  ">
<a href="admin_login.php" ><b>Admin Login</b> </a>
</div>


<center>
<div class="log" style="height:380px";>
<form name="form"  method="post" onsubmit="return check()">
<div class="head" style="color:white;"><h2>LOGIN</h2></div>
<table>
     <tr>
    <td>User Name:</td>
    <td><input type="text" name="username" id="username" class="frm"></td>
	</tr>
	<tr>
	<td>password:</td>
    <td><input type="password" name="password" id="password" class="frm"></td>
	</tr>
	<tr>
	<td>usertype:</td>
	<td>
	    <select name="usertype" class="frm">
        <option value=0>Choice</option>
	    <option value=2>Teacher</option>
	    <option value=1>Student</option>
		<option value=3>Parent</option>
		</select>
	</td>
	
	</tr>
	<tr>
	<td></td>
	<td><input type="submit" name="submit" value="Submit" class="btn"></td>
	</tr>
</table>
	
</form>
</div>
</center>
</body>
</html>


<?php

if(isset($_POST["submit"]))
{
  
  
  $uname=$_POST['username'];
  $psw=$_POST['password'];
  $utype=$_POST['usertype'];
  $sql="select * from login where username='$uname' and password='$psw' and  user_type='$utype' and status=1";
  //echo $sql;
  $result=$conn->query($sql);
 
 
  
 /* $sql1="select ID from student where name='$uname'";
  echo $sql1;
  $res=$conn->query($sql1);
 
 
   foreach ($res as $ro)
  {
	  $sid=$ro['ID'];
  }*/
  if($result->num_rows>=1)
	{
		$sql12="select u_id from users where username='$uname'";
  //echo $sql;
  $resul=$conn->query($sql12);
 
 
   foreach ($resul as $row)
  {
	  $id=$row['u_id'];
  }
		if($utype==1)
		{
			$_SESSION["sid"]=$id;
			$_SESSION["sname"]=$uname;
			if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
			{
				header('location:student_home.php');	 
			}	
		}
		else if($utype==2)
		{
				
			$_SESSION["sname"]=$uname;
			$_SESSION["sid"]=$id;
			if(isset($_SESSION["sname"]) and isset($_SESSION["sid"]))
			{
				header('location:teacher_home.php');						 
			}	
		}
		else if($utype==3)
		{
				
			$_SESSION["sid"]=$id;
			$_SESSION["sname"]=$uname;
			if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
			{
				header('location:parent_home.php');			 
			}	
		}
	}
	else
	{
		echo "<script> alert('Login id or Password or usertype missmatch '); </script>";
	}
	
}
?>	

<?php include("footer.php");?>
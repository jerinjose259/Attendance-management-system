<?php include("header.php");?>

<?php

session_start();
include('dbcon.php'); 
include('student_header.php'); 

$date=$reason=$days="";

if (isset($_POST['submit']))
	
{
		$id=$_SESSION['sid'];
		
		$sql1="select * from student where student_id=$id";
		$res=$conn->query($sql1);
		foreach($res as $row)
		{
			$name=$row['Name'];
			$d=$row['d_id'];
			
			$date=$_POST['date'];
			$reason=$_POST['reason'];
			$days=$_POST['days'];
    	

			$sql2="insert into leaves(student_id,name,div_id,date,reason,days,status) values($id,'$name',$d,'$date','$reason',$days,0)";
			$res2=$conn->query($sql2);
			if($res2)
			{
				echo '<script> alert("LEAVE APPLIED"); </script>';
			}
			else
			{
				echo '<script> alert("Error"); </script>';
			}
			
		
		}
		/*if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}*/

$conn->close();
		
		
		

}
?>




<script>
function check()
    {
        var date=document.forms["form"]["date"].value;
        var reason=document.forms["form"]["reason"].value;
        var days=document.forms["form"]["days"].value;
		 
		
        if(date=="")
        {
            alert("Enter the date");
            document.forms["form"]["date"].focus();
				return false;
        }
		if(reason=="")
        {
            alert("Fill the reason");
            document.forms["form"]["reason"].focus();
				return false;
        }
		if(days=="")
        {
            alert("Fill the days");
            document.forms["form"]["days"].focus();
				return false;
        }
		
	
		
	}

</script>





<style>td{padding:5px}
</style>
<h1 align="center">LEAVE APPLICATION <?php if(isset($_SESSION["sname"])){
//echo $_SESSION["sname"]; echo $_SESSION["sid"];	
} 
			?> </h1>
<center> <br> <br>
<div align="center" style="border:2px solid red;width:500px;height:200px; ">
<form name="form" method="post" style="margin:10px" onsubmit="return check();"> <br>
<table>
<tr>
<td>Date:</td>
 <td> <input type="date" name="date"></td></tr>
 <tr>
<td>Reason:</td>
<td><input type="text" name="reason"></td></tr>
<tr>	
<td>Days:</td>
 <td>   <input type="text" name="days"></td></tr>

<tr><td></td><td align="center">	<input type="submit" name="submit" value="Apply"></td></tr>
	</table>
</form>	

</div> <br><br>
</center>
<?php include("footer.php");?>

	<?php 
include('header.php');
 include('dbcon.php');
 include('student_header.php');
 session_start();
 ?>   

<!DOCTYPE html>
<head>

	<title>PROFILE</title>
<style>
*{ margin:0px;
padding:0px;}
td
{padding:10px;
 }
</style>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


	<center>
		<div style="height:400px"class="log">
		<form name="create"
			  method="POST"
			  action="";
			  onsubmit=""	>
<div class="head">
		<h2 style="text-align:center;color:white">PROFILE</h2>
</div>
		<?php if(isset($_SESSION["sname"])and isset($_SESSION["sid"]))
{
				//echo $_SESSION["sname"];
				$u_id=$_SESSION["sid"];				
			}?>
<?php

$sql="select * from users where u_id='$u_id'";
$res=$conn->query($sql);

if($res)
{
	foreach($res as $row)
	{
?>

<table style="padding:20px;" >
			<tr>
				<td><b>NAME :</b></td>
				<td>
					<?php
						$sql="select u_name from  users";
						$res=$conn->query($sql);
						echo $row["u_name"];
					?>
				</td>
			</tr>
            
		    <tr>
				<td><b>DOB:</b></td>
				<td><?php
						$sql="select DOB from  users";
						$res=$conn->query($sql);
						echo $row["DOB"];

					?>
				</td>
		    </tr>
			
			<tr>
				<td><b>EMAIL:</b></td>
				<td><?php
						$sql="select email from  users";
						$res=$conn->query($sql);
						echo $row["email"];
					?>
				</td>
		    </tr>
			
			<tr>
				<td><b>GENDER :</b></td>
				<td><?php
						$sql="select gender from  users";
						$res=$conn->query($sql);
						echo $row["gender"];

					?>
				</td>
		    </tr>
			
			<tr>
				<td><b>MOBILE :</b></td>
				<td><?php
						$sql="select mobile from  users";
						$res=$conn->query($sql);
						echo $row["mobile"];

					?>
				</td>
		    </tr>
	
			<tr>
				<td><b>ADDRESS :</b></td>
				<td><?php
						$sql="select address from  users";
						$res=$conn->query($sql);
						echo $row["address"];

					?>
				</td>
		    </tr>
			
			<tr>
				<td><b>DATE OF JOINING :</b></td>
				<td><?php
						$sql="select DOJ from  users";
						$res=$conn->query($sql);
						echo $row["doj"];

					?>
				</td>
		    </tr>
			
			<tr>
				<td><b>QUALIFICATION :</b></td>
				<td><?php
						$sql="select qualification from  users";
						$res=$conn->query($sql);
						echo $row["qualification"];

					?>
				</td>
		    </tr>
			
		</table>
<?php
}}
?>
		</form>
		</div>
	</center>
 <?php
include('footer.php');
?>
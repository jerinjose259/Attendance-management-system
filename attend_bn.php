
<?php 

/* 
 designed by :anju 
 Databse : Prince 
 
 */
include('header.php');
include('teacher_header.php');
session_start(); 
include('dbcon.php');
file_get_contents('style.css');




//if($_SERVER["REQUEST_METHOD"]=='POST')
	if(isset($_SESSION["course"]))
{

	
	$batch=$_SESSION["batch"];
	$course=$_SESSION["course"];
	$division=$_SESSION["division"];
	$date=$_SESSION["date"];
	$time=$_SESSION["time"];
	
	
	
	
      $sql="SELECT * FROM student WHERE b_id='$batch' and course_id='$course' and d_id='$division'";
	 // echo $sql;
	  
	  
	  $s=$conn->query($sql);
	  
	
	  
	  echo '<center> <form  method="POST"> <table border="">';
      echo  '<tr>       
                    <th>Name</th>
					<th>STATUS</th>
                </tr> ';
		
foreach($s as $row)
	{
		//$name=$row['Name'];
		echo '<tr> <td> <input type="text" name="'.$row["Name"].'" value="'.$row["Name"].'"> </td>';
		echo '<td> <input type="radio" name="status" value="Present"> Present ';		
		echo '<td> <input type="submit" name="'.$row["ID"].'" value="Mark"> ';			
	}


foreach($s as $row)
{
	if(isset($_POST[$row["ID"]]))
	{
		
		if($_POST[$row["ID"]] and $row["ID"] )
		{
			
			$sid=$row["ID"];
			if(isset($_POST['status']))
			{
			$status=$_POST['status'];
			}
			else
			{
				$status="Absent";
			}
			//echo $_POST[$row["Name"]];
		
			$check="select * from attendance where date='$date' and time='$time' and student='$sid'";
		
			$resul= $conn->query($check);
			//echo $check;
			if($resul->num_rows<1)
			{
				$sql2="insert into attendance (batch,course,division,date,time,student,status) values ( '$batch','$course','$division','$date','$time','$sid','$status')";
				//echo $sql2;
				$res= $conn->query($sql2);
				if($res)
				{
					echo '<script> alert("Marked")';
					echo '</script>';
				}
				else
				{
					echo '<script> alert("Alredy Marked")';
					echo '</script>';
				}
			}
			else
			{
				echo '<script> alert("Alredy Marked Attetence")';
				 
				echo '</script>';
			}
		
		}
	}
		
	
}



echo '</table> <br> <br> </form>';
	


			
	
}
	
	 





include('footer.php');
?>
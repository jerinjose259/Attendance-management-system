<?php include('header.php'); 
/*
Author :Prince 
DBA    :Prince

*/


include('dbcon.php');?>
<?php include('student_header.php'); 
session_start();
?>


<h1 align="center">Welccome <?php if(isset($_SESSION["sname"]) and isset($_SESSION["sid"])){
				echo $_SESSION["sname"];
				$id= $_SESSION["sid"];	 
}?> </h1>
<h3 align="center"> Attentence Details is </h3> <br> <br>
<?php 
 
   echo '<center> <form ><table border="" > <tr> <th> Date </th> <th> ForeNoon/AfterNoon </th> <th style="color:red;"> Status </th> </tr> ';
   $sql="select date,time,status from attendance where student='$id'";
  // echo $sql;
   $res=$conn->query($sql);
   
   foreach($res as $row)
   {
	   echo '<tr> <td> '.$row["date"].'</td>';
		echo	 '<td> '.$row["time"].'</td>';
		echo	 '<td> '.$row["status"].'</td></tr>';
   }
 
?> </table> <br><br><br><br>


<?php include('footer.php'); ?>
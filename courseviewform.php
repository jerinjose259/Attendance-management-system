<?php include('../dbcon.php'); ?>
<!DOCTYPE html>
<html>
<head><title></title></head>
<body>
<table>
<tr>
        <td>BATCH_ID:</td><td><select>
			 <option> -----</option>';
		         <?php
						$sql="SELECT * FROM batch";
						$res=$conn->query($sql);
					
				
						while($row=$res->fetch_assoc())
							{
								?>
								<option> <?php echo $row['b_id']; ?> </option>
								<?php
							}
						   ?></select>  </td>
		
		
  
		
	</tr>
<table>
</body>
</html>

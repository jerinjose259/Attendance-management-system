<?php 

/* author Arun   */

include('dbcon.php');
$nameid=$_POST['datapost'];
$sql="SELECT u_name from users where u_id='$nameid'";
						$res=$conn->query($sql);
              while($row=$res->fetch_assoc())
							{
								?>
								<option> 
								<?php echo $row['u_name']; ?>
								</option>
						<?php
							}
						   ?>


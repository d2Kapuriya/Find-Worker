<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="FindWorker";
	$conn=mysqli_connect( $servername,$username,$password,$dbname
	);
	
	if (!$conn) {
		 die("Connection failed: " . mysqli_connect_error());
	}
	$str2="DELETE FROM `worker` WHERE `worker`.`WorkerID` = 0";	
	mysqli_query($conn,$str2);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Worker Main Page</title>
	<link rel="stylesheet" href="login_design.css">
	<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

</style>
</head>
<body>
	<div id="header">
		<center>
				<h1>Find Worker</h1>
		</center>
			<div id="inside_header">
				Worker ID |
				<?php
					echo $_SESSION['WID'];
				?>	
			</div>

  		<div class="dropdown" >
    		<button class="dropbtn">Menu 
    		</button>
    		<div class="dropdown-content">
    			<button  class="tablinks" onclick="openCity(event, 'Welcome' )" id="defaultOpen">Welcome</button>
    			<button class="tablinks" onclick="openCity(event, 'Profile')">Profile</button>
 				 <button class="tablinks" onclick="openCity(event, 'Status')">Status</button>
 				 <button class="tablinks" onclick="openCity(event, 'Changepass')">Change Password</button>
 				 <button class="tablinks" onclick="openCity(event, 'Logout'),redirect()">Logout</button>
 			</div>
  		</div>
	</div>
	<div id="abstrac">
		
		<div id="Welcome" class="tabcontent">
			<h3>Welcome</h3>
 		 	<p>Find Worker is used to find worker for specific work.</p>
		</div>

		<div id="Profile" class="tabcontent">
			<h3>Profile</h3>
			<?php
				$WID=$_SESSION['WID'];
				$str="SELECT * FROM `worker` where WorkerID=$WID;";
				$result=mysqli_query($conn,$str);
				
				if (mysqli_num_rows($result)>0 ){
					echo "<table border='ridge'>
   							";
   							 while ($row = mysqli_fetch_assoc($result)) { 
  							 echo "<tr>
  							 		<th>Worker ID</th>
   								<td>";echo $row["WorkerID"]; echo"</td>
   								</tr>
   								<tr>
   									<th>Password</th>
    						 	<td>"; echo $row["Password"]; echo"</td>
    						 	</tr>
    						 	<tr>
    						 		<th>Worker Name</th>
    							<td>"; echo $row["Name"]; echo"</td>
    							</tr>
    							<tr>
    						 		<th>Gender</th>
    							<td>"; echo $row["Gender"]; echo"</td>
    							</tr>
    							<tr>
    						 		<th>Age</th>
    							<td>"; echo $row["Age"]; echo"</td>
    							</tr>
    							<tr>
    						 		<th>Worker Type</th>
    							<td>"; echo $row["WorkerType"]; echo"</td>
    							</tr>
    							<tr>
    								<th>City</th>
    							<td>"; echo $row["City"]; echo"</td>
    							</tr>
    							<tr>
    								<th>Contact No</th>
    							<td>"; echo $row["ContactNo"]; echo"</td>
  							 </tr>";
  							  } 
					echo	"</table>";
				}else{
					echo "<br>No Worker Profile Found";
				}
			?>
 		 	
		</div>

		<div id="Status" class="tabcontent">
 			 <h3>Status</h3>
 		<?php
 			$WID=$_SESSION['WID'];
 			 $str="SELECT DISTINCT`CompanyID` FROM `companyworker` WHERE WorkerID=$WID";

			$result=mysqli_query($conn,$str);
				if (mysqli_num_rows($result)>0 ){?>
					
					<table border='ridge'>
   							<tr>
   								<th>Company ID</th>
   								<th>Company Name</th>
    							<th>Address</th>
    							<th>Contact No</th>
    						</tr> 
					
   			 		<?php while ($row = mysqli_fetch_assoc($result)) {
   			 				$CID=$row['CompanyID'];
   			 				$str2="SELECT `CompanyID`,`Name`, `Address`, `ContactNo` FROM `company` WHERE CompanyID=$CID";
   			 				$result2=mysqli_query($conn,$str2);
   			 				while ($row2=mysqli_fetch_assoc($result2)) {?>
   			 			<tr>
   			 				<td><?php echo $row2['CompanyID'];?></td>
   			 				<td><?php echo $row2['Name'];?></td>
   			 				<td><?php echo $row2['Address'];?></td>
   			 				<td><?php echo $row2['ContactNo'];?></td>			 				 
   			 			</tr>
   			 		<?php } }?>
   			 		</table>   			 		
   			 		<?php
   			 	}else{
   			 		echo "Sorry...!!! You are not selected in any company";
   			 	}
		?> 			  
		</div> 
		<div id="Logout" class="tabcontent">
			<h2>Logout...!!!</h2>
			<?php
				unset($_SESSION['CID']);
			?>
			<script type="text/javascript">
				function redirect() {
					alert("Logout Successfull");
					location.replace("Login page.html");

				}
			</script>
			<p>logout successfully</p>
		</div>

		
	<script>
		
		function openCity(evt, menuitem) {
  			var i, tabcontent, tablinks;
 		tabcontent = document.getElementsByClassName("tabcontent");
  			for (i = 0; i < tabcontent.length; i++) {
   				 tabcontent[i].style.display = "none";
 			 }
 			 tablinks = document.getElementsByClassName("tablinks");
  			for (i = 0; i < tablinks.length; i++) {
    			tablinks[i].className = tablinks[i].className.replace(" active", "");
 			 }
 			 document.getElementById(menuitem).style.display = "block";
 			 evt.currentTarget.className += " active";
		}

		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
	</script>

</div>
	<div id="footer">
		<center>
			<p>Find Worker is made by <b>@Dixit Kapuriya</b> from CHARUSAT,Changa.</p>
			<Text>Follow me on</Text>
		<a href="https://www.linkedin.com/in/dixit-kapuriya-b5206915a/">LinkedIn ||</a>
		<a href="https://github.com/d2Kapuriya">GitHub ||</a>
		<a href="http://www.dixitkapuriya.ml/">Web Site ||</a>
		<a href="https://www.instagram.com/d2_kapuriya/">Instagram ||</a>
		<a href="https://www.facebook.com/dixit.kapuriya.33/">Facebook</a>		
		
		<p>GMail: dixitkapuriya192000@gmail.com</p>
		</center>

	</div>



		
</body>
</html>
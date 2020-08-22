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
	$str2="DELETE FROM `company` WHERE `company`.`CompanyID` = 0";
	mysqli_query($conn,$str2)

?>
<!DOCTYPE html>
<html>
<head>
	<title>Company Main Page</title>
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
				Company ID |
				<?php
					echo $_SESSION['CID'];
				?>	
			</div>

  		<div class="dropdown" >
    		<button class="dropbtn">Menu 
    		</button>
    		<div class="dropdown-content">
    			<button  class="tablinks" onclick="openCity(event, 'Welcome' )" id="defaultOpen">Welcome</button>
    			<button class="tablinks" onclick="openCity(event, 'Profile')">Profile</button>
 				 <button class="tablinks" onclick="openCity(event, 'Findworker')">Find Worker</button>
 				 <button class="tablinks" onclick="openCity(event, 'Changepass')">Change Password</button>
 				 <button class="tablinks" onclick="openCity(event, 'Logout'),redirect()">Logout</button>
 				 <!-- 
      			<a href="#" >Profile</a>
     			<a href="#">Find Worker</a>
     			<a href="#">Change Password</a> -->
    		</div>
  		</div>
	</div>
	<div id="abstrac">
		
		<div id="Welcome" class="tabcontent" >
			<h3>Welcome</h3>
 		 	<p>Find Worker is used to find worker for specific work.</p>
		</div>

		<div id="Profile" class="tabcontent">
			<h3>Profile</h3>
			<?php
				$CID=$_SESSION['CID'];
				$str="SELECT * FROM `company` where CompanyID=$CID;";
				$result=mysqli_query($conn,$str);
				
				if (mysqli_num_rows($result)>0 ){
					echo "<table border='ridge'>
   							";
   							 while ($row = mysqli_fetch_assoc($result)) { 
  							 echo "<tr>
  							 		<th>Company ID</th>
   								<td>";echo $row["CompanyID"]; echo"</td>
   								</tr>
   								<tr>
   									<th>Password</th>
    						 	<td>"; echo $row["password"]; echo"</td>
    						 	</tr>
    						 	<tr>
    						 		<th>Company Name</th>
    							<td>"; echo $row["Name"]; echo"</td>
    							</tr>
    							<tr>
    								<th>Address</th>
    							<td>"; echo $row["Address"]; echo"</td>
    							</tr>
    							<tr>
    								<th>Contact No</th>
    							<td>"; echo $row["ContactNo"]; echo"</td>
  							 </tr>";
  							  } 
					echo	"</table>";
				}else{
					echo "<br>No Company Profile Found";
				}
			?>
 		 	
		</div>

		<div id="Findworker" class="tabcontent">
 			 <h3>Workers</h3>
 		<?php
 			 $str="SELECT `WorkerID`, `Name`, `Gender`, `Age`,`WorkerType`,`City`, `ContactNo` FROM `worker`;";

			$result=mysqli_query($conn,$str);
				if (mysqli_num_rows($result)>0 ){?>
					
					<table border='ridge'>
   							<tr>
   								<th>Worker ID</th>
   								<th>Worker Name</th>
    							<th>Gender</th>
    							<th>Age</th>
    							<th>Worker Type</th>
    							<th>City</th>
    							<th>Contact No</th>
    							<th>Status</th>
     						</tr> 
					
   			 		<?php while ($row = mysqli_fetch_assoc($result)) {?>
   			 			<tr>
   			 				<td><?php echo $row['WorkerID'];?></td>
   			 				<td><?php echo $row['Name'];?></td>
   			 				<td><?php echo $row['Gender'];?></td>
   			 				<td><?php echo $row['Age'];?></td>
   			 				<td><?php echo $row['WorkerType'];?></td>
   			 				<td><?php echo $row['City'];?></td>
   			 				<td><?php echo $row['ContactNo'];?></td>
   			 				<td><button class="tablinks" onclick="openCity(event, 'selectworker'), my(this),refresh()" value=<?php echo $row['WorkerID'];?>>Select</button></td> 			 				 
   			 			</tr>
   			 		<?php } ?>
   			 		</table>
   			 		
   			 		<?php
   			 	}else{
   			 		echo "No Workers Found";
   			 	}
		?> 			  
		</div>
		
		<div id="selectworker" class="tabcontent">
			
			<?php

				setcookie("WID", "", time() - 3600);
				echo '<script>
				function refresh(){
						location.reload();
					};
				
   				function my(the){
					var id=the.value;
					alert("Worker ID"+id+" is select");
					document.cookie = "WID="+id;
					
				}
				</script>';

				$WID=$_COOKIE['WID'];;
				
				$CID=$_SESSION['CID'];
				
				if(($WID!=0)&&($WID!=0)){
					$str="INSERT INTO `companyworker` (`CompanyID`, `WorkerID`) VALUES ('$CID', '$WID')";
				  	
				 if (mysqli_query($conn,$str)) {
				 	echo "Worker ID ".$WID." is select";
				 	echo "Select Successfull";
				 	 	
				 }else{
				 	echo "Error to Select ".$row['WorkerID']." : ".mysqli_error();
				 }
				}				
			?>
		</div> 

		<div id="Changepass" class="tabcontent">

 			 <h3>New Password</h3>
 			 <input id="pass"type="password" name="pass" placeholder="Enter New Password">
 			 <button class="tablinks" onclick="openCity(event, 'Changepass'), UpdatePass(),refresh()" value="Save">Save</button>
 			 <script type="text/javascript">
 			 	
 			 	function UpdatePass() {
 			 		alert("UpdatePass Call");
 			 		var x=document.getElementById('pass').value;
 			 		document.cookie="pass"+=x;
 			 		alert(x);
 			 		alert($_COOKIE['pass']);
 			 	}
 			 </script>
 			 <?php
 			 	$p= $_COOKIE['pass'];
 			 	$c=$_SESSION['CID'];
 			 	$str="UPDATE `company` SET `password`=$p WHERE CompanyID=$c";

 			 	if (mysqli_query($conn,$str)) {
				 	echo "<br>Update Successfull";			 	
				 }else{
				 	echo "Error to Update Password :".mysqli_error();
				 
				}
 			 ?>
		</div>
		<div id="Logout" class="tabcontent">
			<h2>Logout...!!!</h2>
			<?php
				//unset($_SESSION['CID']);
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
		<center><center>
			<p>Find Worker is made by <b>@Dixit Kapuriya</b> from CHARUSAT,Changa.</p>
			<Text>Follow me on</Text>
			<a href="https://www.linkedin.com/in/dixit-kapuriya-b5206915a/">LinkedIn ||</a>
			<a href="https://github.com/d2Kapuriya">GitHub ||</a>
			<a href="http://www.dixitkapuriya.ml/">Web Site ||</a>
			<a href="https://www.instagram.com/d2_kapuriya/">Instagram ||</a>
			<a href="https://www.facebook.com/dixit.kapuriya.33/">Facebook</a>		
		
			<p>GMail: dixitkapuriya192000@gmail.com</p>
		</center>
		</center>

	</div>


		
</body>
</html>
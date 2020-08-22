<?php
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

	$str="SELECT WorkerID FROM `Worker`;";
	$result=mysqli_query($conn,$str);
	$noc=mysqli_num_rows($result);

	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Worker</title>
	<link rel="stylesheet" href="login_design.css">
	<script type="text/javascript">
		function chekContact() {
		var values = document.getElementById("no").value;
		console.log(values);
		var pattern = /^[0-9]{10}$/gm;
		var final_value = values.match(pattern);
		if(final_value == null){
			alert("Enter valid Number");
			contact.value="";
			contact.value.focuse();
		}

			// var contact=getElementById('no');
			// var pattern=/^[0 9]{10}$/gmi;
			// if(pattern.test(contact.value)){
			// 	contact.value="";
			// }
		}

		// function verifypass() {

				
		// 	alert("dixit");
		// 	var pass1=document.getElementById('pass1').value;
		// 	var pass2=document.getElementById('pass2').value;
		// 	console.log(pass1);
		// 	console.log(pass2);
		// 	if (pass2!=pass1) {
		// 		alert("Password not match");
		// 		password.value="";
		// 		password.value.focuse();
		// 	}

		// }
	</script>  
</head>
<body style="background-color: skyblue">
<!-- 	your Worker ID is 
	<?php 
//	$companyID=100+$noc;
	echo 9000+$noc+1; 
	?> -->
	<form class="box" action="workerDB.php" method="post">
		<h1>Regestraion Form</h1>
		<div>
			<p>Your Worker ID is <?php echo 9000+$noc+1;?></p>
		</div>

		<div>
			<input type="text" name="name" placeholder="Worker Name" required>
		</div>

		<div id="gender">
  		    <input type="radio" name="gender" value="Male" checked required>Male  <br>
    	    <input type="radio" name="gender" value="Female"required>Female<br>
     		 <input type="radio" name="gender" value="other"required>Other<br>
    	</div>

    	<div>
			<input type="number" min="18" name="age" placeholder="Age" required>
		</div>

	<div id="worker">
        <label><b>Worker Type</b></label>
		<select name="worker" placeholder="Worker Type" required>
			<option  value="" selected>--</option>
			<option value="Mason">Mason</option>
			<option  value="Carpenter">Carpenter</option>
			<option value="BlackSmith">Black Smith</option>
			<option value="Tailor">Tailor</option>
			<option value="Barber">Barber</option>
			<option value="Cleaner">Cleaner</option>
			<option value="Farmer">Farmer</option>
			<option value="Painter">Painter</option>
			<option value="Clothier">Clothier</option>
			<option value="Salesman">Salesman</option>
			<option value="Accountant">Accountant</option>
			<option value="Securityguard">Security Guard</option>
		</select>
	</div>
	
		<div>
			<textarea type="text" name="add" placeholder="Street Address"></textarea>			
		</div>

    <div id="city">
        <label><b>City</b></label>
		<select name="city" placeholder="city" required>
			<option  value="" selected>--</option>
			<option id="p1"  value="Rajkot">Rajkot</option>
			<option id="p1"  value="Jamnagar">Jamnagar</option>
			<option id="p1"  value="Anand">Anand</option>
			<option id="p1"  value="Surat">Surat</option>
			<option id="p1"  value="Vapi">Vapi</option>
			<option id="p1"  value="Morbi">Morbi</option>
		</select>  
	</div>

		<div>
	 		<input id="no"type="text" name="contact" placeholder="Mobile No" onchange="chekContact()" >			
		</div>

		<div>			
			<input id="pass1" type="Password" name="password" placeholder="Password">
		</div>
		<center>
			<input type="Submit" name="Submit" value="Submit"  >
		</center>
		<!-- onclick="chekContact()" -->
	</form>

</body>
</html>
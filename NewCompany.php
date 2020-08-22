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
	$str2="DELETE FROM `company` WHERE `company`.`CompanyID` = 0";
	mysqli_query($conn,$str2);
	$str="SELECT companyID FROM `company`;";
	$result=mysqli_query($conn,$str);
	$noc=mysqli_num_rows($result);

	mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
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
	</script>  

</head>
<body style="background-color: skyblue"><!-- 
	your Company ID is 
	<?php 
//	$companyID=100+$noc;
	//echo 100+$noc+1; 
	?> -->
	<form class="box" action="companyDB.php" method="post">
		<h1>Regestraion Form</h1>
		<div>
			<p>Your Company ID is <?php echo 100+$noc+1;?></p>
		</div>

		<div>
			<input type="text" name="name" placeholder="Company Name" required>
		</div>

		<div>
			<input type="text" name="add" placeholder="Address" required>
		</div>

		<div>
			<input id="no"type="text" name="contact" placeholder="Contact No" onchange="chekContact()" required>
		</div>

		<div>
			<input type="Password" name="password" placeholder="Password">
		</div>
		<center>
			<input type="Submit" name="Submit" value="Submit"  >
		</center>
		<!-- onclick="chekContact()" -->
	</form>

</body>
</html>
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

	if(isset($_POST['Submit'])){
			$cid=100+$noc+1;
			$name=$_POST['name'];
			$add=$_POST['add'];
			$contact=$_POST['contact'];
			$password=$_POST['password'];

				$str="INSERT INTO `company` (`CompanyID`,`password`,`Name`, `Address`, `ContactNo`) VALUES (NULL,NULL, NULL, NULL,NULL),('$cid','$password','$name', '$add','$contact');";
				$str2="DELETE FROM `company` WHERE `company`.`CompanyID` = 0";
				mysqli_query($conn,$str2);
				if(mysqli_query($conn,$str)){

				?>
					<html>
					<head>
 					<link rel="stylesheet" href="login_design.css">
					</head>
					<body>
  						<form class="box_login" method="post" action="Companylogin.php">
  							<h1>Sign Up Succeessful</h1>
							<h2>Click Below Button and Login Again
							</h2>
							<center><button type = "submit" name="Submit" value="submit"><b>Login</b></button></center>
						
				<?php
				}
				else{
					echo "<br>Error to inserting data into database :  ".mysqli_error($conn);
				}			
	}
	else {
			echo "<br>Data not properly submitted from the form";
	}?>

	</form>
		</body>
		</html>
	<?php
?>
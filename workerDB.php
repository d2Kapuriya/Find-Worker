<?php
$servername="localhost";
$username="root";
$password="";
$dbname="FindWorker";
$conn =mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
	echo "connection failed:  ".mysqli_connect_error();
}
$str2="DELETE FROM `worker` WHERE `worker`.`WorkerID` = 0";
mysqli_query($conn,$str2);

$str="SELECT WorkerID FROM `Worker`;";
$result=mysqli_query($conn,$str);
$noc=mysqli_num_rows($result);

if(isset($_POST['Submit'])){
			$wid=9000+$noc+1;
			$name=$_POST['name'];
			$gen=$_POST['gender'];
			$age=$_POST['age'];
			$worker=$_POST['worker'];
			$add=$_POST['add'];
			$city=$_POST['city'];
			$contact=$_POST['contact'];
			$password=$_POST['password'];
			echo $worker;
			
			$str="INSERT INTO `worker` (`WorkerID`, `Name`, `Gender`, `Age`, `WorkerType`, `StreetAdd`, `City`, `ContactNo`, `Password`) VALUES ('$wid', '$name', '$gen', '$age', '$worker', '$add', '$city','$contact', '$password')";

			$str2="DELETE FROM `worker` WHERE `worker`.`WorkerID` = 0";

				mysqli_query($conn,$str2);
				
				if(mysqli_query($conn,$str)){

					?>

					<html>
					<head>
 					<link rel="stylesheet" href="login_design.css">
					</head>
					<body>
  						<form class="box_login" method="post" action="Workerlogin.php">
  							<h1>Sign Up Succeessful</h1>
							<h2>Click Below Button and Login Again
							</h2>
							<center><button type = "submit" name="Submit" value="submit"><b>Login</b></button></center>
						</form>
					</body>
					</html>
				<?php
				}
				else{
					echo "<br>Error to inserting data into database :  ".mysqli_error($conn);
				}			
	}
	else {
			echo "<br>Data not properly submitted from the form";
	}


?>
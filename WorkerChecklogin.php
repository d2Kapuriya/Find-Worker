<?php
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname="FindWorker";
		$conn=mysqli_connect( $servername,$username,$password,$dbname);

		if (!$conn) {
			 die("Connection failed: " . mysqli_connect_error());
		}

		if (isset($_POST['Submit'])) {

		$WID=$_POST['wid'];
		$password=$_POST['pass'];
		
		$str="SELECT WorkerID,password FROM `worker` where WorkerID=$WID;";
		$result=mysqli_query($conn,$str);
	

		if(mysqli_num_rows($result)>0){
			$arr=mysqli_fetch_assoc($result);
			if ($arr["WorkerID"]==$WID) {
				
				if ($arr["password"]==$password) {
					echo "<br>Login Successfully";
					$_SESSION['WID']=$WID;
					header("Location: WorkerMainPage.php");
				}
				else
				{
					echo "<br>password is incorrect";
				}
			}
			else{
				echo "<br>Worker ID not found";
			}
		}
		else{
			echo "<br>Worker ID not found";
		}	
	}else{
		echo "<br>Login Data not properly submitted";
	}
mysqli_close($conn);
?>

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

		$CID=$_POST['cid'];
		$password=$_POST['pass'];
		
		$str="SELECT CompanyID,password FROM `company` where CompanyID=$CID;";
		$result=mysqli_query($conn,$str);
	

		if(mysqli_num_rows($result)>0){
			$arr=mysqli_fetch_assoc($result);
			if ($arr["CompanyID"]==$CID) {
				
				if ($arr["password"]==$password) {
					echo "<br>Login Successfully";
					$_SESSION['CID']=$CID;
					header("Location: CompanyMainPage.php");
				}
				else
				{
					echo "<br>password is incorrect";
				}
			}
			else{
				echo "<br>Company ID not found";
			}
		}
		else{
			echo "<br>company ID not found";
		}	
	}else{
		echo "<br>Data not properly submitted";
	}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Worker Login</title>
	<link rel="stylesheet" href="login_design.css">
</head>
<body style="background-color: skyblue">
	<form class="box_login" action="WorkerChecklogin.php" method="POST">
		<h1>Login</h1>
		<div>
			<input  type="text" name="wid" placeholder="WorkerID" required>
		</div>
		
		<div>
			<input type="Password" name="pass" placeholder="Password" required>
		</div>
		<center><button type = "submit" name="Submit" value="submit"><b>Login</b></button></center>
		<br>
		<br>
		<h2>New Worker ?? :</h2>
		
		<a href="NewWorker.php"><input type="button" name="Sign Up" value="Sign Up"></a>
		
	</form>
	

</body>
</html>
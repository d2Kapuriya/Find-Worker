<!DOCTYPE html>
<html>
<head>
	<title>Company Login</title>
	<link rel="stylesheet" href="login_design.css">
	
</head>
<body  style="background-color: skyblue">
	<form class="box_login" action="CompanyChecklogin.php" method="POST">
		<h1>Login</h1>
		<div>
			<input  type="text" name="cid" placeholder="CompanyID" required>
		</div>
		<div>
			<input type="Password" name="pass" placeholder="Password" required>
		</div>
		<center>
			<button type = "submit" name="Submit" value="Submit"><b>Login</b></button>
		</center>
		<br>
		<br>
		<h2>New Company ?? :</h2>
		
		<a href="NewCompany.php"><input type="button" name="Sign Up" value="Sign Up"></a>
		
	</form>
	

</body>
</html>
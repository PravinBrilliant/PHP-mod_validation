<?php $conn=mysqli_connect("localhost","root","","validation"); 
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$dup=mysqli_query($conn,"Select * from user where email='$email' limit 1");

	if(mysqli_num_rows($dup)>0)
	{
		echo '<script>alert("Email already registered...");window.location.href="index.php";</script>';
	}else{
	$insert="Insert into users values('','$email','$name','$mobile')";
	if(mysqli_query($conn,$insert))
	{
		echo'<script>alert("Registered Succesfully")</script>';
	}
	else{
		echo'<script>alert("Registered Failed")</script>';
	}}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>validation</title>
</head>
<body class="bg"><center><div class="card"><form method="Post">
	<h3 style="text-decoration: underline;">Redirection Form</h3><br>
	<label>Name:<br>
		<input type="text" name="name" required><br>
	</label> 
	<label>E-mail:<br>
		<input type="email" name="email" required><br>
	</label>
	<label>Mobile:<br> 
		<input type="tel" name="mobile"  pattern="[6789][0-9]{9}"> </label> <br><br>
		<input type="submit" name="submit" class="btn btn-primary">
</form></div></center>

</body>
</html>

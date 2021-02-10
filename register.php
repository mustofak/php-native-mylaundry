<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
<body>
	<h1 position="center">Register</h1>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" placeholder="Username"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" placeholder="Nama"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" placeholder="Email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td>Retype Password</td>
				<td><input type="text" name="password2" placeholder="Retype Password"></td>
			</tr>
		</table><br>
			<center><input type="submit" name="register" value="Register"></center>
	</form>
	</br>
	Sudah memiliki akun? <a href="login.php">Klik di sini!</a><br>

</body>
</html>
<?php 
	session_start();

	include 'config.php';

	if(isset($_POST['register'])){
		$username = $_POST['username'];
		$nama = $_POST["nama"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$password2 = $_POST["password2"];
		//$level = $_POST['level'];

		mysqli_query($mysqli, "INSERT INTO `admin` (`nama`, `username`, `email`, `password`, `password2`, `level`) VALUES ('$nama', '$username', '$email', '$password', '$password', 'user')") or die(mysqli_error($mysqli));
        // Show message when user added
        /*echo "User added successfully. <a href='index.php'>View Users</a>";
*/
		if($username == $username && $password == $password2){
				$_SESSION['level'] == "user";
				header('location:index.php');
		}else if($nama==""){
			print "Nama harus diisi!";

		}else if ($email=="") {
			print "Email harus diisi!";

		}else if($password==""){
			print "Password harus diisi!";

		}else if($password != $password2){
			print "Password harus sama!";
		}
	}
?>
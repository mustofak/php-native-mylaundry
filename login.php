<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
	<script>
		// Get the modal
		var modal = document.getElementById('id01');

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		    if (event.target == modal) {
		        modal.style.display = "none";
		    }
		}
	</script>
<body>

	<div class="bgimg">
	  	<div class="topleft">
	    	<p>Selamat Datang!</p>
		</div>
	</div>
	
	<div class="middle">
	    <h1>SELAMAT DATANG DI MY-LAUNDRY!</h1>
	   	<p>Ketuk login untuk masuk</p>
	<hr>
	   	<button
		onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login
	</button>
	</div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="" method="post">

    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <form method="post">

	      <label for="username"><b>Username</b></label>
	      	<input type="text" placeholder="Enter Username" name="username" required>

	      <label for="password"><b>Password</b></label>
	      	<input type="password" placeholder="Enter Password" name="password" required>
	        
	      <button type="submit" name="login" value="Login">Login</button>
	      <label>
	        <input type="checkbox" checked="checked" name="remember"> Remember me
	      </label>

	<br>Tidak memiliki akun? <a href="register.php">Klik di sini.</a>
</form>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<?php
	include 'config.php';  
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
		$query = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($query);
		$username = $row['username'];
		$password = $row['password'];
		$level = $row['level'];
		$count = mysqli_num_rows($row);

            if (($row['username'] == $username) && ($row['password'] == $password) && ($row['level']=="admin")){
				header('location:admin.php');      
            }else if (($row['username'] == $username) && ($row['password'] == $password) && ($row['level']=="user")){
                header('location:user.php');
            }else{
             $error="Username atau Password salah!";
             echo "<script type='text/javascript'>alert('$error');</script>";
            }
        }
?>



</form>
</body>
</html>

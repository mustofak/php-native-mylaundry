<?php  
	session_start();
	session_destroy();
	echo "<script>window.alert('Logout Berhasil!')</script>";
	echo "<script>location.href='index.php'</script>";
?>
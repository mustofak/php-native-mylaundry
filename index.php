<?php
//membuat session
session_start();
?>
<!DOCTYPE html>
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php  
        // Create database connection using config file
        include 'config.php';
        if (isset($_SESSION['username']) && $_GET['menu']!= 'login') {
            echo "<script>
                    location.href='./index.php?menu=login'
                  </script>";
        }
    ?>

    <?php  
        if(!isset($_SESSION['username']) && !isset($_GET['menu'])){
        print "<script>location.href='./index.php?menu=login'</script>";
        }else if(isset($_SESSION['username']) && !isset($_GET['menu']) || $_GET['menu']=="order"){
            include "order.php";
        }else if($_GET['menu']=="add_user"){
            include "add_user.php";
        }else if ($_GET['menu']=="history") {
            include 'history.php';
        }else if($_GET['menu']=="login"){
            include "login.php";      
        }else if($_GET['menu']=="logout"){
            session_destroy();
            print "<script>location.href='index.php'</script>";
        }
    ?>
</body>
</html>
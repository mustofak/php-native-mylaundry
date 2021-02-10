<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id_order = $_GET['id_order'];

// Delete user row from table based on given id
$result = mysqli_query($mysqli, "DELETE FROM `order` WHERE id_order='$id_order'")or die(mysqli_error($mysqli));


// After delete redirect to Home, so that latest user list will be displayed.
header("Location:order_admin.php");
?>
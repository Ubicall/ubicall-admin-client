<?php
$id = $_GET['id'];

$db   = new db_connector();
$conn = $db->connect();
include('class/email_destination.php');
$email_dest = new email_dest;
$email_dest->conn = $conn;

if(isset($_GET['id']))
{
	$delete_email = $email_dest->delete_email($id);
	echo" <script>window.location.href = 'index.php?pg=email'; </script>";
} 
?>

<?php
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;

if(isset($_GET['id']))
{
	$delete_queue= $queue_manager->delete_queue($_GET['id']);
	echo" <script>	window.location.href = 'index.php?pg=queue'; </script>";
} 
?>

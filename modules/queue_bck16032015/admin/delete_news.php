<?php
$id=$_GET['id'];
//error_reporting(0);
//error_reporting(E_ALL);
include('../classes/db_connector.php'); 
$db= new db_connector();
$conn= $db->connect();
include('../modules/news/class/news_manager.php');
$news_manager=new news_manager;
$news_manager->conn=$conn;
$news=$news_manager->delete_news_by_id($id);

 echo " <script>
	window.location.href = 'index.php?pg=news&delete=true';
        </script>";
 
 ?>
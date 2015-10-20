<?php
if(($_GET['pg'] == "agents") && ($_GET['action'] == "") ){
    
    include 'view.php';
    
}elseif(($_GET['pg'] == "agents") && ($_GET['action'] == "view") ){
    
    include 'view.php';
    
}elseif(($_GET['pg'] == "agents") && ($_GET['action'] == "add" )){
    
    include 'add.php';

    
}elseif(($_GET['pg'] == "agents") && ($_GET['action'] == "edit") ){
    
    include 'edit.php';
    
}elseif(($_GET['pg'] == "agents") && ($_GET['action'] == "delete") ){
    
    include 'view.php';    
}else {
	include 'view.php';
}


?>

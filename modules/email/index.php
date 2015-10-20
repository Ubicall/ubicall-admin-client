<?php
if($_GET['action']=="add")
    include_once 'add.php';
elseif($_GET['action']=="delete")
    include_once 'delete.php';
elseif($_GET['action']=="edit")
    include_once 'edit.php';
else
    include_once 'view.php';
?>
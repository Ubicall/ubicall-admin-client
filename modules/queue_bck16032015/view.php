<?php 
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;
$get_queue= $queue_manager->select_queue();
?>
<div id="right-side">

<h2>Queues</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>View Queues</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">

<div id="green-contents" class="contents">

<table id="mt">

<thead>
<tr>
<th>Queue Name</th>
<th>Queue Number</th>
<th>Edit</th>
<th>Delete</th>

</tr>
</thead>

<tbody>
<?php
foreach ($get_queue as $queue)
{ ?>
    <tr>
    <td><?php echo $queue['name']; ?></td>
    <td><?php echo $queue['number'] ?></td>
   
    <td><a href="index.php?pg=queue&action=edit&id=<?php echo $queue['id']; ?>" title="Edit"><img src="img/icons/edit.png" alt="Edit" /></a></td>
    <td><a href="index.php?pg=queue&action=delete&id=<?php echo  $queue['id']; ?>" title="Delete" onclick="javascript: if(confirm('Are you sure you want to delete  ?')) 	return true;    else 	return false; "><img src="img/icons/delete.png" alt="Delete"   /></a></td>
    </tr>
<?php
}
?>

 

</tbody>

</table>

<div id="green" style="margin: auto;"></div>

</div>

</div>
</div>
</div>

<!-- Body End -->

</div>

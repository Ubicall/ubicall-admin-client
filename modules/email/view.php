<?php 

$db   = new db_connector();
$conn = $db->connect();
include('class/email_destination.php');
$email_dest = new email_dest;
$email_dest->conn = $conn;


$client_id = $_SESSION['admin_user'];






$get_emails = $email_dest->select_emails($client_id );

?>

<div id="right-side">

<h2>Destinations</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3></h3>
<a href="index.php?pg=email&action=add">Add Destination</a>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">

<div id="green-contents" class="contents">

<table id="example" class="display" cellspacing="0" width="100%" >

<thead>
<tr>
<th>Name</th>
<th>Destination</th>
<th style="text-align: center;" >Edit</th>
<th style="text-align: center;" >Delete</th>

</tr>
</thead>
<tfoot>
<tr>
<th>Name</th>
<th>Destination</th>
<th style="text-align: center;" >Edit</th>
<th style="text-align: center;" >Delete</th>
</tr>
</tfoot>
<tbody>
<?php
foreach ($get_emails as $destination)
{ ?>
    <tr>
    <td><?php echo $destination['name']; ?></td>
    <td><?php echo $destination['destination'] ?></td>
   
    <td style="text-align: center;" >
    	<a href="index.php?pg=email&action=edit&id=<?php echo $destination['id']; ?>" title="Edit">
    	  <img src="img/icons/edit.png" alt="Edit" />
        </a>
    </td>
    <td style="text-align: center;" >
    	<a href="index.php?pg=email&action=delete&id=<?php echo  $destination['id']; ?>" title="Delete" onclick="javascript: if(confirm('Are you sure you want to delete  ?')) 	return true;    else 	return false; ">
    		  <img src="img/icons/delete.png" alt="Delete"   />
    	</a>
    </td>
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

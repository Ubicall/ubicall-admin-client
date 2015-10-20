<?php

$ID = $_GET["id"];
//error_reporting(0);
error_reporting(E_ALL);
//echo "Antoine is here ya mens " .$ID;
//include('classes/db_connector.php'); 
$db= new db_connector();
$conn= $db->connect();
//$conn2 = $db->connect2();
$conn5 = $db->connect5();

include('class/agents_manager.php');

$agents_manager       = new agents_manager;
$agents_manager->conn = $conn;
//$agents_manager->conn2 = $conn2;
$agents_manager->conn5 = $conn5;

if($ID){
    
   

    $Agent_data = $agents_manager->select_agents_by_id($ID);
    foreach ($Agent_data as $Agent){        
	//echo "HIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII" . $Agent['number'] . $Agent['sip'] ;
	//print_r ($Agent);
    }
//exist;
    if($Agent)
    {
    	$agents_manager->delete_agents_by_id_fs($Agent['sip']);
    	$agents_manager->delete_agents_by_id_callcenter($Agent['number']);
    }

    $agents_manager->delete_agents_by_id($ID);
}

$license_key = $agents_manager->select_license_key();
$agents               = $agents_manager->select_agents();

?>

<script type="text/javascript">
        $(document).ready(function () {
          
        $('#green').smartpaginator({ totalrecords: <?php // echo count($agents); ?> , recordsperpage: 5, datacontainer: 'mt', dataelement: 'tr', initval: 0, next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });
        });
</script>
  
<!-- Right Side -->

<div id="right-side">

<h2>Agents</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3></h3>
<a href="index.php?pg=agents&action=add">Add Agent</a>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">

<div id="green-contents" class="contents">

<table id="example" class="display" cellspacing="0" width="100%">

<thead>
<tr>
<th>Agent Name</th>
<th>Agent Number</th>
<th style="text-align: center;">Edit</th>
<th style="text-align: center;">Delete</th>
<!--<th>Details</th>-->
</tr>
</thead>
<tfoot>
<tr>
<th>Agent Name</th>
<th>Agent Number</th>
<th style="text-align: center;">Edit</th>
<th style="text-align: center;">Delete</th>
</tr>
</tfoot>
<tbody>
<?php 
   
   foreach($agents as $agent){
    
?>
<tr>
<td><?php echo $agent['name']; ?></td>
<td><?php echo $agent['number']; ?></td>
<td style="text-align: center;"><a href="index.php?pg=agents&action=edit&id=<?php echo $agent['id']; ?>" title="Edit"><img src="img/icons/edit.png" alt="Edit" /></a></td>
<td style="text-align: center;"><a href="index.php?pg=agents&action=delete&id=<?php echo $agent['id']; ?>" title="Delete" onclick="javascript: if(confirm('Are you sure you want to delete  ?')) 	return true;    else 	return false; "><img src="img/icons/delete.png" alt="Delete" /></a></td>
<?php /* <td><a class="button-details" href="index.php?pg=agents&action=edit&id=<?php echo $agent['id']; ?>">View Details</a></td>
*/ ?>
  </tr>
 

<?php } ?>

</tbody>

</table>

<div id="green" style="margin: auto;"></div>

</div>

</div>
</div>
</div>

<!-- Body End -->
</div>

<div class="clear"></div>

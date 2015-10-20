<?php
$appid=$_GET['appid'];

// just in case...
error_reporting( E_ALL );
ini_set( 'display_errors', 'on' );
/**
 * Require CFPropertyList
 */
require_once('lib/CFPropertyList.php');
$plist = new CFPropertyList();
$plist->add( $dict1 = new CFDictionary() );

$dict1->add( 'Initial', new CFString('Grid') );
$dict1->add( 'Version', new CFNumber( 2 ) );



include('modules/tree/class/tree_manager.php');
$tree_manager=new tree_manager;
$tree_manager->conn = $conn;
$tree=$tree_manager->select_first_node($appid);

$form_page_action="";
echo '
<div class="dTree">';
echo "<pre>";
//echo "<ul>";
       

foreach($tree as $row)
{   $txt='';
    $current_node 	= $row['id'];	
    $node_name		= $row['nodeName'];
    $type		= $row['type'];
    $depLevel		= $row['level'];
    $nodeAccessString   = $row['accessstring'];
    
    echo '<li>';
    echo $node_name;
    echo "</li>";

    if($type=='2')
    {
        $dict->add( 'choices', $array = new CFArray() );
    }
    
    $tree_manager->get_node_children($appid, $current_node,$form_page_action ,$myfile);

}

//print_r($tree);
echo "</pre>";
echo "</div>";
$plist->saveXML( dirname(__FILE__).'/example-create-01.xml.plist' );



?>

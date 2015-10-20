<?php

     
$appid=$_GET['appid'];
/// NO OO for class tree!
// just in case...
error_reporting( E_ALL );
//ini_set( 'display_errors', 'on' );
/**
 * Require CFPropertyList
 */
require_once('lib/CFPropertyList.php');
$plist = new CFPropertyList();
$plist->add( $dict1 = new CFDictionary() );

$dict1->add( 'Initial', new CFString('Grid') );
$dict1->add( 'Version', new CFNumber( 2 ) );

$waiting[]="";

include('modules/tree/class/tree_manager.php');

$tree=select_first_node($appid,$conn);

$form_page_action="";
echo '
<div class="dTree">';
echo "<pre>";
//echo "<ul>";
       
global $array;
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
        
        get_node_children($appid, $current_node,$form_page_action ,'2',$conn);
    }
    else
    {
        get_node_children($appid, $current_node,$form_page_action ,'0' ,$conn);
    }
}

//print_r($tree);
echo "</pre>";
echo "</div>";
$plist->saveXML( dirname(__FILE__).'/example-create-01.xml.plist' );

print_r($waiting);

?>

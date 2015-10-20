<?php


###############################################################################
    function select_first_node($appid,$conn)
    {

        $result_set = mysqli_query($conn,"SELECT * FROM  `applicationtree` where `appID`='".$appid."' and parent_id=0 order by level asc ");
        
        $pages_array = array();
        while($pages_array[] = mysqli_fetch_array($result_set,MYSQL_ASSOC));
        array_pop($pages_array); 
  
        return $pages_array;
    }
$array="";
$c_parent_id="";
$last_id="";
$new_array_flag=0;

###############################################################################
    function get_node_children($application_id, $parent_id,$form_page_action,$type_c,$conn)
    { echo "@@@@".$type_c ."@@@";
        global $dict1;
        global $array;
        global $node_form_page_action_start ;
        global $waiting;
	$sql  = " select id, nodeName, type,level,accessstring, choice  ";
	$sql .= " from applicationtree ";
	$sql .= " where parent_id = $parent_id ";
	$sql .= " order by level asc, choice asc, nodeName asc";
	
        
	$result = mysqli_query($conn,$sql);
//	if($type_c == '2')
//        { $array="";
//           $dict1->add( 'choices', $array = new CFArray() );
//            
//        }
        if(mysqli_num_rows($result) != 0)
	{   //echo "<li>";
            echo "<ul>";
                
		while($row=mysqli_fetch_array($result))	
		{
                    $dict3="";
                    $txt="";
                    $current_node           = $row[0];	
                    $node_name              = $row[1];	
                    $type                   = $row[2];
                    $depLevel               = $row[3];
                    $nodeAccessString       = $row[4];
                    $node_choice            = $row[5];
                    
                    echo "<li>";
                    echo '<a href="#"><img src="img/001.png" alt="" />';
                    echo $node_name;
                    echo '</a>';
//                    if($type == '2')
//                    {
//                        echo "+type2+";
//                       $dict1->add( 'choices', $array = new CFArray() );
//                        //$array->add( new CFString( 'Kyra' ) );
//                       //$array->add('Year Of Birth', new CFNumber( 1965 ));
//                    }
                    if($type == '97' || $type == '2' )
                    {
                        if($parent_id!=$c_parent_id && $type=='2')
                        { 
                            $array="";
                            $dict1->add( $node_name, $array = new CFArray() );
                        }
                        else
                        {
                            $array->add($dict3 = new CFDictionary());
                            $dict3->add( 'ChoiceType', new CFString('$node_choice') );
                            $dict3->add( 'ChoiceText', new CFString($node_name) );
                            
                        }
                        $c_parent_id=$parent_id;
                        $last_id=$current_node; 
                        get_node_children($application_id, $current_node,$form_page_action ,$type,$conn);
                    }
                    else
                    {   
                        $dict1->add($dict3 = new CFDictionary());
                        $dict3->add( 'ScreenTitle', new CFString($node_name) );
                        $dict3->add( 'ScreenType', new CFString('Info') );
                        
                        get_node_children($application_id, $current_node,$form_page_action ,'0',$conn);	
                    }
                    echo "</li>";
                    
                }
             echo "</ul>";  
            // echo "</li>";
        }
    }
    
    ###############################################################################
    function check_node_is_parent($node_id,$conn)
    {

        $result_set = mysqli_query($conn,"SELECT * FROM  `applicationtree` where `appID`='".$appid."' and parent_id=0 order by level asc ");
        
        $pages_array = array();
        while($pages_array[] = mysqli_fetch_array($result_set,MYSQL_ASSOC));
        array_pop($pages_array); 
  
        return $pages_array;
    }
        
    

<?php
class queue_manager
	{

###############################################################################
		function select_agent_announcement()
			{
                                $result_set = mysql_query("select * from `agent_announcement` ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################
               function add_queue($name,$number,$password,$wrap_up_time,$agent_announcement)
                        {
                                $date=date('Y-m-d');
                                $sql="INSERT into queue SET `name` ='".$name."',`password` ='".$password."', `number` ='".$number."', `wrap_up_time` ='".$wrap_up_time."' ,`agent_announcement` ='".$agent_announcement."'  ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
 		function select_queue()
			{
                                $result_set = mysql_query("select * from `queue` ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################                       
###############################################################################
		function delete_queue($id)
			{
                                $result_set = mysql_query("DELETE from `queue`  WHERE `id` ='".$id."' ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################                           
 ########################################################################################
 		function select_queue_by_id($id)
			{
                                $result_set = mysql_query("select * from `queue` where id ='".$id."'   ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################                              

 ########################################################################################
 		function select_agents()
			{
                                $result_set = mysql_query("select * from `agent` ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################                         
                        
                        
	}
?>

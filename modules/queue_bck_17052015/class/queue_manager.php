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
###############################################################################
		function select_join_announcement()
			{
                                $result_set = mysql_query("select * from `join_announcement` ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################
               function add_queue($name,$number,$password,$wrap_up_time,$agent_announcement,$policy,$cidname,$qweight,$music_on_hold,
            $callrecording,$caller_vol_adj,$agent_vol_adj,$autopause,$maxcallers,$joinempty,$leaveempty,$s_agent,$d_agent)
                        {
                                $date=date('Y-m-d');
                                $sql="INSERT into queue SET `name` ='".$name."',`password` ='".$password."', `number` ='".$number."', `wrap_up_time` ='".$wrap_up_time."' ,`agent_announcement` ='".$agent_announcement."' ,`policy` ='".$policy."' ,`cidname` ='".$cidname."' ,`qweight` ='".$qweight."' ,`music_on_hold` ='".$music_on_hold."' ,`callrecording` ='".$callrecording."' ,`caller_vol_adj` ='".$caller_vol_adj."' ,`agent_vol_adj` ='".$agent_vol_adj."' ,`autopause` ='".$autopause."' ,`maxcallers` ='".$maxcallers."' ,`joinempty` ='".$joinempty."' ,`leaveempty` ='".$leaveempty."' ,`s_agent` ='".$s_agent."' ,`d_agent` ='".$d_agent."' , admin_id ='".$_SESSION['admin_user']."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
###############################################################################
               function edit_queue($id,$name,$number,$password,$wrap_up_time,$agent_announcement,$policy,$cidname,$qweight,$music_on_hold,
            $callrecording,$caller_vol_adj,$agent_vol_adj,$autopause,$maxcallers,$joinempty,$leaveempty,$s_agent,$d_agent)
                        {
                                $date=date('Y-m-d');
                                $sql="update queue SET `name` ='".$name."',`password` ='".$password."', `number` ='".$number."', `wrap_up_time` ='".$wrap_up_time."' ,`agent_announcement` ='".$agent_announcement."' ,`policy` ='".$policy."' ,`cidname` ='".$cidname."' ,`qweight` ='".$qweight."' ,`music_on_hold` ='".$music_on_hold."' ,`callrecording` ='".$callrecording."' ,`caller_vol_adj` ='".$caller_vol_adj."' ,`agent_vol_adj` ='".$agent_vol_adj."' ,`autopause` ='".$autopause."' ,`maxcallers` ='".$maxcallers."' ,`joinempty` ='".$joinempty."' ,`leaveempty` ='".$leaveempty."' ,`s_agent` ='".$s_agent."' ,`d_agent` ='".$d_agent."' where id='".$id."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
 		function select_queue()
			{
                                $result_set = mysql_query("select * from `queue` where admin_id ='".$_SESSION['admin_user']."' ",$this->conn) ;
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
                                $result_set = mysql_query("select * from `agent` where admin_id ='".$_SESSION['admin_user']."' ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################                         
                        
                        
	}
?>


<?php


class agents_manager
	{

    var $conn;
    var $conn2;
    var $conn3;
    var $conn5;

###############################################################################
		function select_license_key()
			{
                                $result_set = mysql_query("select licence_key from `admin` where id =".$_SESSION['admin_user'] ,$this->conn) ;
				$license_key =  mysql_result($result_set,0);
				return $license_key;
			}
###############################################################################
###############################################################################
		function select_agents()
			{
                                $result_set = mysql_query("select * from `agent` where admin_id ='".$_SESSION['admin_user']."' ORDER BY id DESC",$this->conn) ;
				//echo " HIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII " .$_SESSION['admin_user'];
				//exit;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################

###############################################################################
		function select_agents_by_id($id)
			{
                                $result_set = mysql_query("select * from `agent`  WHERE `id` ='".$id."'  ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################      
//
###############################################################################
		function select_global()
			{
                                $result_set = mysql_query("select * from `global_agent_id` where id='1'  ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
//print_r($pages_array);
				return $pages_array;
			}
###############################################################################                   
###############################################################################


               function add_agents($number, $name, $email, $password, $img, $sip, $sip_password)
    {
        //$hash_pswd = hash("sha256",$password,false);
        $license_key = $this->select_license_key();
        $sql = "INSERT agent SET `number` ='" . $number . "', `name` ='" . $name . "', `email` ='" . $email . "' ,`password` ='" . $password . "' , admin_id ='" . $_SESSION['admin_user'] . "' , img='" . $img . "' , `sip`='" . $sip . "' ,`sip_password`='" . $sip_password . "' , `api_key`='" . $license_key . "'  ";
        //echo $sql;
        if (!mysql_query($sql, $this->conn))
        {
             return FALSE; 
           // echo "MySQL Error:" . mysql_error();
        } else
        {

            return TRUE;
        }
        //exit;
    }
########################################################################################
###############################################################################


               function add_agents_sip($number,$name,$email,$password,$img,$sip,$sip_password )
                        {
                                
                                $sql = "INSERT into `sipfriends` set  name ='".$sip."' ,regserver='agents01' , host='dynamic' , type='friend' , context='ubicallinbound' , secret ='".$sip_password."' , transport ='tcp,udp' , dtmfmode='rfc2833' , nat ='force_rport,comedia' , disallow ='all' , allow='gsm,alaw,ulaw' , rtptimeout='60' , rtpholdtimeout='300' , faxdetect='no' ";
                                //echo $sql;
                                if(!mysql_query($sql, $this->conn3))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
                                //exit;
			}
########################################################################################
###############################################################################


               function add_agents_sip_fs($number,$name,$email,$password,$img,$sip,$sip_password )
                        {
                                
                                $sql = "INSERT into `directory` set  username ='".$sip."' ,domain_id=3 , cache=0";
                                //echo $sql;
                                if(!mysql_query($sql, $this->conn5))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
				$last_insert_id= mysql_insert_id( $this->conn5);
                                $sql = "INSERT into `directory_params` set directory_id = ".$last_insert_id." , param_name ='password' , param_value = '".$sip_password."' ";
                                //echo $sql;
                                if(!mysql_query($sql, $this->conn5))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
                                $sql = "INSERT into `directory_params` set directory_id = ".$last_insert_id." , param_name ='dial-string' , param_value = '\${rtmp_contact(default/\${dialed_user}@104.239.164.247)}'";
                                //echo $sql;
                                if(!mysql_query($sql, $this->conn5))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }

                                //exit;
			}
########################################################################################
###############################################################################


               function add_agents_callcenter($number,$name,$username,$password)
                        {
                                $sql = "INSERT INTO agent  SET `type`='Agent' , `number` ='".$number."', `name` ='".$name."', `password` ='".$password."' , estatus ='A'";
                                if(!mysql_query($sql, $this->conn2))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
###############################################################################


               function edit_agents($id,$number,$name,$email,$password,$img)
                        {
                               
                                $sql="UPDATE agent SET `number` ='".$number."', `name` ='".$name."', `email` ='".$email."' ,`password` ='".$password."' ,`img`='".$img."'   WHERE `id` ='".$id."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
								//echo $sql; exit;
			}
########################################################################################
###############################################################################


               function update_global()
                        {
                               
                                $sql="UPDATE global_agent_id SET global_id = global_id+1 ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
//###############################################################################


               function edit_agents_noimage($id)
                        {
                               
                                $sql="UPDATE agent SET `img` ='' WHERE `id` ='".$id."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################
###############################################################################


               function edit_agents_callcenter($id,$number,$name,$username,$password)
                        {
                               
                                $sql="UPDATE agent  SET  `number` ='".$number."', `name` ='".$name."', `password` ='".$password."' WHERE `number` ='".$number."' ";
                                if(!mysql_query($sql, $this->conn2))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
			}
########################################################################################

###############################################################################
		function delete_agents_by_id($id)
			{
                                $result_set = mysql_query("DELETE from `agent`  WHERE `id` ='".$id."' ",$this->conn) ;
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
                                $result_set = mysql_query("DELETE from `queue_agent`  WHERE `agent_id` ='".$id."' ",$this->conn) ;
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
###############################################################################   
###############################################################################
		function delete_agents_by_id_callcenter($number)
			{
                                $result_set = mysql_query("UPDATE agent SET estatus='I' WHERE number='".$number."' ",$this->conn2) ;
				
				$pages_array = array();
				while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
				array_pop($pages_array); 
				return $pages_array;
			}
############################################################################### 
########################################################################################
               function delete_agents_by_id_fs($sip)
                        {
                                $sql = "SELECT id FROM  `directory` WHERE username ='".$sip."'";
                                $result_set = mysql_query( $sql ,$this->conn5) ;
				$fs_dr_id =  mysql_result($result_set,0);
				if ($fs_dr_id)
				{
	                                if(!mysql_query("DELETE FROM `directory_params` where directory_id = ".$fs_dr_id."" ,$this->conn5))
        	                        {
                		                    echo "MySQL Error:" . mysql_error(); 
                                	}
	                                if(!mysql_query("DELETE FROM `directory` where id = ".$fs_dr_id,$this->conn5))
        	                        {
                		                    echo "MySQL Error:" . mysql_error(); 
                                	}
				}
                                //echo $sql;

                                //exit;
			}
###############################################################################

	}
?>

<?php
class email_dest
    {

###############################################################################
        function add_email($client_id,$licence_key,$email_name,$email_des,$email_sub)
                        {
                               
                            $sql = "INSERT into email_destination SET `client_id` ='".$client_id."',

                                 `licence_key`  = '".$licence_key."', `name` ='".$email_name."' ,
                                 `destination` ='".$email_des."' , `subject` ='".$email_sub."'   
                                 ";
                                
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
            }

###############################################################################
        function update_email($id,$email_name,$email_des,$email_sub)
                        {
                                $sql = "update email_destination SET 
                                       `name` ='".$email_name."' ,`destination` ='".$email_des."' ,
                                       `subject` ='".$email_sub."'

                                        where id='".$id."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
            }
                            
###############################################################################
        function get_email($client_id)
            {
                            $result_set = mysql_query("select * from `email_destination` where client_id='".$client_id."' ",$this->conn) ;
                            $pages_array = array();
                            while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
                            array_pop($pages_array); 
                            return $pages_array;
            }
###############################################################################                         
        function select_emails($client_id)
            {
                            $result_set = mysql_query("select * from `email_destination` where client_id=".$client_id,$this->conn) ;
                            $pages_array = array();
                            while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
                            array_pop($pages_array); 
                            return $pages_array;
            } 

###################################################################################
        function select_email_by_id($id)
            {
                            $result_set = mysql_query("select * from `email_destination` where id ='".$id."'   ",$this->conn) ;
                            $pages_array = array();
                            while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
                            array_pop($pages_array); 
                            return $pages_array;
            }
####################################################################################
        function delete_email($id)
            {
                            $result_set = mysql_query("DELETE from `email_destination`  WHERE `id` ='".$id."' ",$this->conn) ;
                            $pages_array = array();
                            while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
                            array_pop($pages_array); 
                            return $pages_array;
            }   
#####################################################################################
    function select_admin_by_id($id)
            {
        
                            $result_set = mysql_query("select * from `admin`  WHERE `id` ='" . $id . "' ", $this->conn);
                            $pages_array = array();
                            while ($pages_array[] = mysql_fetch_array($result_set, MYSQL_ASSOC));
                            array_pop($pages_array);
                            return $pages_array;
            }                     


                        
    }
?>

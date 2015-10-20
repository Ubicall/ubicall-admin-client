<?php
class whours_manager
    {

###############################################################################
        function add_wh($client_id,$queue_id,$time_zone,$offset,$day_0,$day_0_start,$day_0_end,

                          $day_1,$day_1_start,$day_1_end,$day_2,$day_2_start,$day_2_end,
                          $day_3,$day_3_start,$day_3_end,$day_4,$day_4_start,$day_4_end,
                          $day_5,$day_5_start,$day_5_end,$day_6,$day_6_start,$day_6_end)
                        {
                                $queue_id =""; 
                                $sql = "INSERT into working_hours SET `client_id` ='".$client_id."',`queue_id` ='".$queue_id."',
                                 `time_zone` ='".$time_zone."', `time_zone_offset` ='".$offset."' ,
                                 `day_0` ='".$day_0."' ,`day_0_start` ='".$day_0_start."' ,`day_0_end` ='".$day_0_end."' ,
                                 `day_1` ='".$day_1."' ,`day_1_start` ='".$day_1_start."' ,`day_1_end` ='".$day_1_end."' ,
                                 `day_2` ='".$day_2."' ,`day_2_start` ='".$day_2_start."' ,`day_2_end` ='".$day_2_end."' ,
                                 `day_3` ='".$day_3."' ,`day_3_start` ='".$day_3_start."' ,`day_3_end` ='".$day_3_end."' ,
                                 `day_4` ='".$day_4."' ,`day_4_start` ='".$day_4_start."' ,`day_4_end` ='".$day_4_end."' ,
                                 `day_5` ='".$day_5."' ,`day_5_start` ='".$day_5_start."' ,`day_5_end` ='".$day_5_end."' ,
                                 `day_6` ='".$day_6."' ,`day_6_start` ='".$day_6_start."' ,`day_6_end` ='".$day_6_end."'  
                                 ";
                                
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
            }

###############################################################################
        function update_wh($client_id,$time_zone,$offset,$day_0,$day_0_start,$day_0_end,

                          $day_1,$day_1_start,$day_1_end,$day_2,$day_2_start,$day_2_end,
                          $day_3,$day_3_start,$day_3_end,$day_4,$day_4_start,$day_4_end,
                          $day_5,$day_5_start,$day_5_end,$day_6,$day_6_start,$day_6_end)
                        {
                                $sql="update working_hours SET 
                                 `time_zone` ='".$time_zone."', `time_zone_offset` ='".$offset."' ,
                                 `day_0` ='".$day_0."' ,`day_0_start` ='".$day_0_start."' ,`day_0_end` ='".$day_0_end."' ,
                                 `day_1` ='".$day_1."' ,`day_1_start` ='".$day_1_start."' ,`day_1_end` ='".$day_1_end."' ,
                                 `day_2` ='".$day_2."' ,`day_2_start` ='".$day_2_start."' ,`day_2_end` ='".$day_2_end."' ,
                                 `day_3` ='".$day_3."' ,`day_3_start` ='".$day_3_start."' ,`day_3_end` ='".$day_3_end."' ,
                                 `day_4` ='".$day_4."' ,`day_4_start` ='".$day_4_start."' ,`day_4_end` ='".$day_4_end."' ,
                                 `day_5` ='".$day_5."' ,`day_5_start` ='".$day_5_start."' ,`day_5_end` ='".$day_5_end."' ,
                                 `day_6` ='".$day_6."' ,`day_6_start` ='".$day_6_start."' ,`day_6_end` ='".$day_6_end."'  
                                 where client_id='".$client_id."' ";
                                if(!mysql_query($sql, $this->conn))
                                {
                                    echo "MySQL Error:" . mysql_error(); 
                                }
            }
                            
###############################################################################
        function get_whs($client_id)
            {
                $result_set = mysql_query("select * from `working_hours` where client_id='".$client_id."' ",$this->conn) ;
                $pages_array = array();
                while($pages_array[] = mysql_fetch_array($result_set,MYSQL_ASSOC));
                array_pop($pages_array); 
                return $pages_array;
            }
###############################################################################                         
                        
                        
    }
?>

<?php

class admin_manager
{

    var $conn;

    function select_admin_by_id($id)
    {
        $result_set = mysql_query("select * from `admin`  WHERE `id` ='" . $id . "' ", $this->conn);
        $pages_array = array();
        while ($pages_array[] = mysql_fetch_array($result_set, MYSQL_ASSOC));
        array_pop($pages_array);
        return $pages_array;
    }

       function check_password($id, $password)
    {
        $result_set = mysql_query("select id from `admin`  WHERE `id` ='" . $id . "' and `password` = '".$password."' ", $this->conn);
        $pages_array = array();
        while ($pages_array[] = mysql_fetch_array($result_set, MYSQL_ASSOC));
        array_pop($pages_array);
        return $pages_array;
    }

    function check_login($username, $password)
    {
        $result_set = mysql_query("select id,full_name from `admin`  WHERE `user_name` ='" . $username . "' and `password` = '".$password."'   ", $this->conn);
        
        $pages_array = array();
        while ($pages_array[] = mysql_fetch_array($result_set, MYSQL_ASSOC));
        array_pop($pages_array);
        return $pages_array;
    }
    function edit_admin($id, $fullname, $username, $password)
    {

        $sql = "UPDATE admin SET `full_name` ='" . $fullname . "', `user_name` ='" . $username . "', `password` ='" . $password . "' WHERE `id` ='" . $id . "' ";
        if (!mysql_query($sql, $this->conn))
        {
            echo "MySQL Error:" . mysql_error();
        }
    }

}

?>
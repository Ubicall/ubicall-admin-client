<?php

class db_connector
	{
//	  var $db_name = "ubi"; #Database Name
	  var $db_name = "ubicall"; #Database Name
	  var $db_user = "ubiuser";  #Database User
	  var $db_password = "UbIPaWd15dB@1"; #Database Password
	  var $db_host = "10.176.192.120"; #Database Server
  
	  var $db_name2 = "call_center"; #Database Name
	  var $db_user2 = "ubiuser";  #Database User
	  var $db_password2 = "UbIPaWd15dB@1"; #Database Password
	  var $db_host2 = "10.209.97.29"; #Database Server        

	  var $db_name3 = "ast_agent"; #Database Name
	  var $db_user3 = "ubiuser";  #Database User
	  var $db_password3 = "UbIPaWd15dB@1"; #Database Password
	  var $db_host3 = "10.176.192.120"; #Database Server

//	  var $db_name4 = "webservice"; #Database Name
	  var $db_name4 = "ubicall"; #Database Name
	  var $db_user4 = "ubiuser";  #Database User
	  var $db_password4 = "UbIPaWd15dB@1"; #Database Password
	  var $db_host4 = "10.176.192.120"; #Database Server

	  var $db_name5 = "FS_DB"; #Database Name
	  var $db_user5 = "ubiuser";  #Database User
	  var $db_password5 = "UbIPaWd15dB@1"; #Database Password
	  var $db_host5 = "10.209.68.186"; #Database Server

#####################################################################

#connect method establish connection and return connection reference# 

#####################################################################

	  function connect()
		{

		   $connection = mysql_connect($this->db_host,$this->db_user,$this->db_password) or die(mysql_error());

		   mysql_select_db($this->db_name) or die(mysql_error());

		   mysql_set_charset('utf8', $connection); 

		   return $connection;

		}
	  function connect2()
		{

		   $connection2 = mysql_connect($this->db_host2,$this->db_user2,$this->db_password2) or die(mysql_error());

		   mysql_select_db($this->db_name2) or die(mysql_error());

		   mysql_set_charset('utf8', $connection2); 

		   return $connection2;

		}

	  function connect3()
		{

		   $connection3 = mysql_connect($this->db_host3,$this->db_user3,$this->db_password3) or die(mysql_error());

		   mysql_select_db($this->db_name3) or die(mysql_error());

		   mysql_set_charset('utf8', $connection3); 

		   return $connection3;

		}

#####################################################################


	  function connect4()
		{

		   $connection4 = mysql_pconnect($this->db_host4,$this->db_user4,$this->db_password4) or die(mysql_error());

		   mysql_select_db($this->db_name4) or die(mysql_error());

		   mysql_set_charset('utf8', $connection4); 

		   return $connection4;

		}
       
#####################################################################


	  function connect5()
		{

		   $connection5 = mysql_pconnect($this->db_host5,$this->db_user5,$this->db_password5) or die(mysql_error());

		   mysql_select_db($this->db_name5) or die(mysql_error());

		   mysql_set_charset('utf8', $connection5); 

		   return $connection5;

		}
       
}

?>

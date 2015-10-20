<?php


#####################################################################

#connect method establish connection and return connection reference# 

#####################################################################
 
     $host="localhost";
     $user="root";
     $pass="root";
     $db="sand_ict_new";
     global $conn;
     $conn=mysqli_connect($host,$user,$pass,$db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


if (!mysqli_set_charset($conn , "utf8")) {
    //printf("Error loading character set utf8: %s\n", mysqli_error($con));
  $d="";
} else {
    //printf("Current character set: %s\n", mysqli_character_set_name($con));
  $d="";
}

?>

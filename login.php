<?php
if(isset($_SESSION['admin_user']))
{
    echo "<script language=\"javascript\">location.href='index.php'</script>";
}

include_once 'auth.php';

if (isset($_POST['submit'])) 
{ //echo "s1";
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    include_once 'lib/db_connector.php';
    $db= new db_connector();
    $conn= $db->connect();
    include('modules/admin/class/admin_manager.php');
    $admin_manager=new admin_manager;
    $admin_manager->conn=$conn;
  
    
    $admin=$admin_manager->check_login($username,$password);
    //print_r($admin); echo "XXXX". $admin[0]['id']; exit;
    if(!empty($admin))
    {
         $_SESSION['admin_name']=$admin[0]['full_name'];
        $_SESSION['admin_user']=$admin[0]['id'];
	$auth_array=auth( $username , $_POST['password'] );
	//echo $auth_array['access_token']; echo "   To";  exit;
	// auth session
	$_SESSION['access_token'] = $auth_array['access_token'];
	$_SESSION['access_expires_in'] = $auth_array['expires_in'];
	setcookie("access_token", $auth_array['access_token'] , time()+3600 , '/' ,'ubicall.com');
	//echo $_SESSION['access_token']; 
	echo "<script language=\"javascript\">location.href='index.php'</script>";
    }
    else
    {
        echo "<script language=\"javascript\">alert('Wrong Username or Password');</script>";
        echo "<script language=\"javascript\">location.href='login.php'</script>";
    }
    
    
} 
if($_GET['action']=='logout')
{
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
session_regenerate_id(true);
logout_auth($_COOKIE['access_token']);

unset($_COOKIE['access_token']);
setcookie("access_token", "", time() - 3600 ,'/','ubicall.com');

echo "<script language=\"javascript\">location.href='login.php'</script>";
}
?>



<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Ubicall | Login</title>

<link rel="shortcut icon" type="img/x-icon" href="img/favicon.ico" />
<link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>

<div id="login-top">
<img id="logo" src="img/logo.png" alt="Ubicall" />
</div>

<div id="login-bottom">

<div class="login-content">

<form action="" method="POST">

<div class="notification information png_bg">

<div>Please Enter Username &amp; Password</div>

</div>

    <p><label>Username:</label><input class="text-input" type="text" name="username" /></p>

<div class="clear"></div>

<p><label>Password:</label><input class="text-input" type="password" name="password" /></p>

<div class="clear"></div>

<p><input class="button but-right" type="submit" value="submit" name="submit" /></p>

</form>

</div>

</div>

</body>

</html>

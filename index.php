<?php
session_start();
 $_SESSION['admin_user'];
if (!isset($_SESSION['admin_user']))
{
    echo "<script language=\"javascript\">location.href='login.php'</script>";
}
  
  echo "<script>

    localStorage.setItem('auth-tokens', '".$_SESSION['storage']."');
	</script>";
error_reporting(0);
//error_reporting(E_ALL);
include_once 'lib/db_connector.php';
include 'includes/header.php'; 
// <!-- Left Side -->

 include 'includes/menu.php'; 

//<!-- Right Side -->

if($_GET['pg']=="")
{ //echo "<script>alert('dd');</script>";
 include 'home.php';
}
elseif($_GET['pg']=="queue")
{
    include 'modules/queue/index.php';
}
elseif($_GET['pg']=="agents")
{
    include 'modules/agent/index.php';
}
elseif($_GET['pg']=="admin")
{
    include 'modules/admin/profile.php';
}
elseif($_GET['pg']=="working")
{
    include 'modules/working/index.php';
}
elseif($_GET['pg']=="email")
{
    include 'modules/email/index.php';
}

echo "<script> $(window).bind('beforeunload', function(){

  localStorage.removeItem('auth-tokens');

});


</script>";

//<!-- Footer -->

 include 'includes/footer.php'; ?>

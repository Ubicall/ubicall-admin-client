<div id="left-side">

<div class="logo"><img src="img/logo.png" alt="ubicall Logo" /></div>

<h4>Hello, <?php  echo  $_SESSION['admin_name'] ;?> | <a href="login.php?action=logout" title="Sign Out">Sign Out</a></h4>

<div id="clock"></div>
<script>
function goToDesigner(){
// TODO check if your broswer supoert html5 and localstorage api
var token= JSON.parse(localStorage.getItem('auth-tokens')).access_token;
var license= JSON.parse(localStorage.getItem('auth-tokens')).licence;
var ourURL = 'https://designer.ubicall.com/?access_token='+token+ "&licence_key="+license;
window.open(ourURL);
}

</script>
<!-- Main Menu -->
<ul id="main-nav">
<li><a href="index.php" class="nav-top-item no-submenu <?php if(!isset($_GET['pg'])) echo "current"; ?>" title="Dashboard">Dashboard</a></li>
<li><a href="#" onclick="goToDesigner()" class="nav-top-item no-submenu <?php if($_GET['pg']=='tree') echo "current"; ?>" title="Launch App Designer">Launch App Designer</a></li>
<li><a  href="index.php?pg=queue" class="nav-top-item no-submenu <?php if($_GET['pg']=='queue') echo "current"; ?>" title="Queues">Queues</a></li>
<li><a href="index.php?pg=agents" class="nav-top-item no-submenu <?php if($_GET['pg']=='agents') echo "current"; ?>" title="Agents">Agents</a>
<li><a href="index.php?pg=working" class="nav-top-item no-submenu <?php if($_GET['pg']=='working') echo "current"; ?>" title="working hours">Working Hours</a>
</li>
<li><a href="index.php?pg=email" class="nav-top-item no-submenu <?php if($_GET['pg']=='email') echo "current"; ?>" title="email destination">Email Destination</a>
<li><a href="index.php?pg=admin" class="nav-top-item no-submenu <?php if($_GET['pg']=='admin') echo "current"; ?>" title="Admin Profile">Admin Profile</a></li>
</ul>

</div>


<div class="clear"></div>

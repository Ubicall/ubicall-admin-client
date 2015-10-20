<!-- Right Side -->

<div id="right-side">

<h2>Admin Profile</h2>

<div class="clear"></div>


<!-- Body -->
<?php 
error_reporting(E_ALL);

$id = $_SESSION['admin_user'];


$db   = new db_connector();
$conn = $db->connect();

include('class/admin_manager.php');

$admin       = new admin_manager;
$admin->conn = $conn;
$admin_datas  = $admin->select_admin_by_id($id);

foreach($admin_datas as $admin_data){
    
}


if(isset($_POST["update"])){
    
    $fullname = $_POST["FullName"];
    $username = $_POST["UserName"];
    $oldpassword=md5($_POST['OldPassword']);
    $password = md5($_POST["NewPassword"]);
    $check=$admin->check_password($id,$oldpassword);
    if(!empty($check)) 
    {
        $admin->edit_admin($id,$fullname,$username,$password);


    ///////////////////////////////

$m = new MongoClient("mongodb://10.208.201.195:27017");
$db = $m->selectDB('ubi_ivr_designer');
$collection = new MongoCollection($db, 'users');
//$pass=hash('sha256', $_POST["NewPassword"]);
///
$salt = '$2a$08$'.substr(strtr(base64_encode(uniqid(22,true)), '+', '.'), 0, 22);
$pass = crypt($_POST["NewPassword"], $salt);
////
 $collection->update(array("username"=>"$username"), array('$set'=>array("username"=>"$username","password"=>"$pass")));
 //////////////////////////


        echo"<script>alert('Updated');</script>";
    }
    else
    {
        echo"<script>alert('Wrong Old Password'); </script>";
    }
 
    
    
}
    
?>
<?php 

//$label= array("Full Name","User Name","Password");
//$name = array("fullname","username","pasword");
//$type = array("text","text","password");
//
//$ad_form = $admin->create_form("5",$type,$name,$label,"text-input large-input");
//
// echo $ad_form; 

?>

<div class="content-box">
<div class="content-box-header">
<h3>Edit Profile</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<form action=""  method="POST" enctype="multipart/form-data">
<fieldset>

<p><label>Full Name</label>
    <input value="<?php echo $admin_data["full_name"]; ?>" class="text-input large-input" readonly type="Text" id="large-input" name="FullName" required />
</p>

<p>
    <label>User Name</label>
    <input value="<?php echo $admin_data["user_name"]; ?>" class="text-input large-input" readonly type="Text" id="large-input" name="UserName" required />
</p>

<p>
    <label>Old Password</label>
    <input value="" class="text-input large-input" type="password" id="large-input" name="OldPassword" required />
</p>

<p>
    <label>New Password</label>
    <input class="text-input large-input" type="password" id="password" name="NewPassword" required />
</p>

<p>
    <label>Confirm Password</label>
    <input class="text-input large-input" type="password" id="confirm_password" name="ConfirmPassword" required />
</p>

<p>
    <label>licence key</label>
    <input value="<?php echo $admin_data["licence_key"]; ?>" readonly="readonly" class="text-input large-input" type="Text" id="large-input" name="licence key" />
</p>
<p><input class="button" type="submit" value="Save" name="update" /> 
</p>

</fieldset>
</form>
    
<script type="text/javascript">

var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

</script>

</div>
</div>
</div>

<!-- Body End -->

</div>

<div class="clear"></div>

<?php
//error_reporting(E_ALL);
$db= new db_connector();
$conn= $db->connect();
include('class/email_destination.php');
$email_dest       = new email_dest;
$email_dest->conn = $conn;


$client_id = $_SESSION['admin_user'];


$admin_datas  = $email_dest->select_admin_by_id($client_id);

foreach($admin_datas as $admin_data){
    
}

$licence_key = $admin_data["licence_key"];

?>
<?php 

/****************** Add Data for first time *********************/

  if(isset($_POST["add_email"])){    

      $email_name  = $_POST['EmailName'];
      $email_des   = $_POST['EmailTo'];
      $email_sub   = $_POST['Subject'];
    
      
    $add_email   = $email_dest->add_email($client_id,$licence_key,$email_name,$email_des,$email_sub);
    $success="1";
    

/*******************************
    $my_header = "From: Ubicall  <" . $email_name . ">\r\n"
               . "Content-Type: text/html\r\n";

     if(@mail($email_to,$email_sub,$email_mess,$my_header))
    {


      $my_header2 = "From: Ubicall  <" . $email_name . ">\r\n"
                  . "Content-Type: text/html\r\n";

        $subject2  = "Ubicall";
        $message2  = "Dear, " .$email_name. " Your message has been sent";

        mail($email_name,$subject2,$message2,$my_header2);
     
  }
*******************************/

       echo "<script>alert('added !')</script>";
       echo" <script>window.location.href = 'index.php?pg=email';</script>";
}
?>


<!-- Right Side -->

<div id="right-side">

<h2>Email Destination</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Add Destination</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<?php 
if($success =="1"){
  echo "<h3 style='color:#027a79;'>Thanks, Your Email Destination added.</h3></br>";
}
?>

<form action="" id="email_dest" method="POST">

<p>
  <label>Name</label>
  <input class="text-input large-input" type="text" id="large-input" name="EmailName" required />
</p>

<p>
  <label>Destination</label>
  <input class="text-input large-input" type="email" id="large-input" name="EmailTo" required 
         pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" title="Please enter valid email"/>
</p>

<p>
  <label>Subject</label>
  <input class="text-input large-input" type="text" id="large-input" name="Subject" required />
</p>



<hr />

<p>
 
    <input class="button" type="submit" name="add_email" value="Save" /> 
    <input class="button" type="reset" value="Reset" />
</p>

</fieldset>

</form>

</div>
</div>
</div>
    
<!-- Body End -->

</div>
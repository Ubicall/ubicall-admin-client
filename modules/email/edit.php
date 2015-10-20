<?php

$id = $_GET['id'];

$db   = new db_connector();
$conn = $db->connect();
include('class/email_destination.php');
$email_dest = new email_dest;
$email_dest->conn = $conn;

$get_email_by_id = $email_dest->select_email_by_id($id);

foreach ($get_email_by_id as $des) {
    
    $d_name = $des["name"];
    $d_dest = $des["destination"];
    $d_sub  = $des["subject"];

}

?>
<?php 
/********************* Update Date ****************************/

  if(isset($_POST["update_email"])){    

      $email_name  = $_POST['EmailName'];
      $email_des   = $_POST['EmailTo'];
      $email_sub   = $_POST['Subject'];
    

      $update_email = $email_dest->update_email($id,$email_name,$email_des,$email_sub);
      $updates="1"; 

/*************************

      $my_header = "From: Ubicall  <" . $email_name . ">\r\n"
           . "Content-Type: text/html\r\n";

       if(@mail($email_to,$email_sub,$email_mess,$my_header))
      {

      //$too = "info@ubicall.com";
      $my_header2 = "From: Ubicall  <" . $email_name . ">\r\n"
           . "Content-Type: text/html\r\n";

          $subject2   = "Ubicall";
          $message2  = "Dear, " .$email_name. " Your message has been sent";
          mail($email_name,$subject2,$message2,$my_header2);
  }
***************************/
    
        echo "<script>alert('Modified !')</script>";
        echo" <script>window.location.href = 'index.php?pg=email';</script>";
    
}


$get_email_by_id = $email_dest->select_email_by_id($id);

    foreach ($get_email_by_id as $des) {        
        $d_name = $des["name"];
        $d_dest = $des["destination"];
        $d_sub  = $des["subject"];
    }

?>


<!-- Right Side -->

<div id="right-side">

<h2>Email Destination</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Email Destination</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<?php 
if($updates =="1"){
  echo "<h3 style='color:#027a79;'>Great, Your data updated.</h3></br>";
}

?>

<form action="" id="email_dest" method="POST">

<p>
  <label>Name</label>
  <input class="text-input large-input" type="text" id="large-input" value="<?php echo $d_name; ?>"
         name="EmailName" required />
</p>

<p>
  <label>Destination</label>
  <input class="text-input large-input" type="email" id="large-input" value="<?php echo $d_dest; ?>"
         name="EmailTo" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" title="Please enter valid email"/>
</p>

<p>
  <label>Subject</label>
  <input class="text-input large-input" type="text" id="large-input" value="<?php echo $d_sub; ?>"
         name="Subject" required />
</p>



<hr />

<p>
  
    <input class="button" type="submit" name="update_email" value="Update" /> 
    <input class="button" type="reset" value="Reset" />
</p>

</fieldset>

</form>

</div>
</div>
</div>
    
<!-- Body End -->

</div>
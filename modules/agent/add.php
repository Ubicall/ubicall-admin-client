<?php 
error_reporting(E_ALL);
//    include('../../lib/db_connector.php'); 
    $db = new db_connector();
    //$conn = $db->connect();
//    $conn2 = $db->connect2();
//    $conn3 = $db->connect3();

    include('class/agents_manager.php');
    
    $agents_manager = new agents_manager;
    $conn = $db->connect();
    $agents_manager->conn = $conn;




function generatepassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}    
    
    
  if(isset($_POST["add_agent"])){
         
      $Agent_name     = $_POST["AgentName"];
      $Agent_number   = $_POST["number"];
      $Agent_email = $_POST["email"];
      $Agent_pass     = $_POST["password"]; 
      
    if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/JPEG")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/JPG")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/png")
    || ($_FILES["file"]["type"] == "image/jpg"))
    && ($_FILES["file"]["size"] < 10000000))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        }
        else
        {

            move_uploaded_file($_FILES["file"]["tmp_name"],
            "agent_images/" .time()."_". $_FILES["file"]["name"]);
            $img=time()."_".$_FILES["file"]["name"];

        }
     }
     
     //if($img =='') 
     
     //start new agent code

    $agent_global = $agents_manager->select_global();
    foreach ($agent_global as $agent_g){        
    }
     //print_r($agent_g);
     $global_agent_id=$agent_g['global_id'];

    $next_client = sprintf("%09d", $global_agent_id);
  
    $sip="90000"."000". $next_client;

    $sip_password=generatepassword(16);
        
    $add_agents=  $agents_manager->add_agents($Agent_number,$Agent_name,$Agent_email,$Agent_pass,$img,$sip,$sip_password);
    if($add_agents){
        
   

//$conn2 = $db->connect2();
//    $agents_manager->conn2 = $conn2;
//      $agents_manager->add_agents_callcenter($Agent_number,$Agent_name,$Agent_email,$Agent_pass); 

$conn3 = $db->connect3();
    $agents_manager->conn3 = $conn3;
      $agents_manager->add_agents_sip($Agent_number,$Agent_name,$Agent_email,$Agent_pass,$img,$sip,$sip_password);

$conn5 = $db->connect5();
    $agents_manager->conn5 = $conn5;
      $agents_manager->add_agents_sip_fs($Agent_number,$Agent_name,$Agent_email,$Agent_pass,$img,$sip,$sip_password);

    $conn = $db->connect();
    $agents_manager->conn = $conn;
      $agents_manager->update_global();

//      file_get_contents("https://10.209.97.29/put_queue.php?number=".$Agent_number."&password=".$Agent_pass."&name=".$Agent_username);
    
      echo"<script>window.location.href='index.php?pg=agents&action=view';</script>";
       }
       else
   {
           
          echo"<script>
              alert('Agent already exists!');
           
              
</script>";
   }
  }

?>
<!-- Right Side -->

<div id="right-side">

<h2>Agents</h2>

<div class="clear"></div>

<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Add Agent</h3>
<a href="index.php?pg=agents">View Agents</a>

</div>
<div class="content-box-content">
<div class="tab-content default-tab">

<form action=""  method="POST" enctype="multipart/form-data">

<fieldset>

<p>
<label>Agent Name</label>
<input class="text-input large-input" type="text" name="AgentName" required />
</p>
<label>Agent Image</label>
<input class="text-input large-input" type="file" name="file"  />
</p>

<hr />

<p>
<label>Agent Number</label>
<input class="text-input large-input" type="text" name="number" required />
</p>

<p>
<label>Agent Email</label>
<input class="text-input large-input" type="email" name="email" required placeholder="Enter agent email"/> 
</p>

<p>
<label>Agent Password</label>
<input class="text-input large-input" type="password" name="password" id="password" required />
</p>

<p>
<label>Confirm Password</label>
<input class="text-input large-input" type="password" name="confpass" id="confirm_password" required /> 
</p>

<hr />

<p>
<input class="button" type="submit" name="add_agent" value="Save" /> <input class="button" type="reset" value="Reset" />
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

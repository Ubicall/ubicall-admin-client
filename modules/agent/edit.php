<?php 
  
    $ID = $_GET["id"];
//    include('../../lib/db_connector.php'); 
    $db = new db_connector();
    $conn = $db->connect();
//    $conn2 = $db->connect2();
    include('class/agents_manager.php');
    
    $agents_manager = new agents_manager;
    $agents_manager->conn = $conn;
//    $agents_manager->conn2 = $conn2;
    $Agent_data = $agents_manager->select_agents_by_id($ID);
    foreach ($Agent_data as $Agent){        
    }
    if($_GET['noimage']=="true")
    {
        $agents_manager->edit_agents_noimage($ID);
        echo "<script>window.location.href='index.php?pg=agents&action=edit&id=".$ID."';</script>";
    }
     
  if(isset($_POST["update_agent"])){
             
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

               $uploaded= move_uploaded_file($_FILES["file"]["tmp_name"],
                "agent_images/" .time()."_". $_FILES["file"]["name"]);
                $img=time()."_".$_FILES["file"]["name"];



            }
        }
      
      $agents_manager->edit_agents($ID,$Agent_number,$Agent_name,$Agent_email,$Agent_pass,$img);
      $agents_manager->edit_agents_callcenter($ID,$Agent_number,$Agent_name,$Agent_username,$Agent_pass);
//      file_get_contents("https://10.209.97.29/edit_queue.php?number=".$Agent_number."&password=".$Agent_pass."&name=".$Agent_username);

  
       echo "<script>window.location.href='index.php?pg=agents&action=edit&id=".$ID."';</script>";
  }
  
?>
<!-- Right Side -->

<div id="right-side">

<h2>Agents</h2>

<div class="clear"></div>

<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Update Agent</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<?php //echo "<pre>"; print_r($Agent_data); echo "</pre>"; ?>
<form action=""  method="POST" enctype="multipart/form-data">

<fieldset>

<p>
<label>Agent Name</label>
<input value="<?php echo $Agent['name'];  ?>" class="text-input large-input" type="text" name="AgentName" required />
</p>
<p>
<label>Agent Image</label>
<label class="myLabel">
    <input type="file"  name="file" value="<?php echo $Agent['img'];  ?>" />
    <span>Choose File</span>
</label>
 &nbsp; <?php if($Agent['img']!="") { ?> <a href="index.php?pg=agents&action=edit&id=<?php echo $Agent['id'];  ?>&noimage=true" >Remove Image</a> &nbsp;&nbsp; <img src="agent_images/<?php echo $Agent['img'];  ?>"  style="float: right; height: 75px;" > <?php } ?>
</p>

<hr />

<p>
<label>Agent Number</label>
<input value="<?php echo $Agent['number'];  ?>" class="text-input large-input" type="text" name="number" required />
</p>

<p>
<label>Agent Email</label>
<input value="<?php echo $Agent['email'];  ?>" class="text-input large-input" type="email" name="email" required placeholder="Enter agent email" /> 
</p>

<p>
<label>Agent Password</label>
<input value="<?php echo $Agent['password'];  ?>" class="text-input large-input" type="password" name="password" id="password" required />
</p>

<p>
<label>Confirm Password</label>
<input value="<?php echo $Agent['password'];  ?>" class="text-input large-input" type="password" name="confpass" id="confirm_password" required /> 
</p>

<hr />

<p>
<input class="button" type="submit" name="update_agent" value="Update" /> <input class="button" type="reset" value="Reset" />
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

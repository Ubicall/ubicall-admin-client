<?php
$id = $_GET['id'];
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;

$get_agent_announcement= $queue_manager->select_agent_announcement();

$get_queue_by_id= $queue_manager->select_queue_by_id($id);

if($_POST['submit'])
{
    $name=$_POST['name'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $wrap_up_time=$_POST['wrap_up_time'];
    $agent_announcement=$_POST['agent_announcement'];
    //add
    $queue_manager->add_queue($name,$number,$password,$wrap_up_time,$agent_announcement);
    echo "<script>alert('added !')</script>";
    	 echo" <script>
			window.location.href = 'index.php?pg=queue';
		</script>";
    
}


foreach ($get_queue_by_id as $qu)
{
    
?>

<div id="right-side">

<h2>Queues</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Edit Queue</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">

    <form action="" method="POST">

<fieldset>

<p>
<label>Queue Name</label>
<input class="text-input large-input" type="text" name="name" required value="<?php echo $qu['name'] ?>" />
</p>

<hr />
<p>
<label>Queue Number</label>
<input class="text-input large-input" type="text" name="number" required value="<?php echo $qu['number'] ?>" />
</p>
<p>
<label>Queue Password</label>
<input class="text-input large-input" type="password" name="password" required  onchange=" if(this.checkValidity()) form.password2.pattern = this.value;" value="<?php echo $qu['password'] ?>" />
</p>
<p>
<label>Queue Password Retry</label>
<input class="text-input large-input" type="password" name="password2" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" value="<?php echo $qu['password'] ?>" />
</p>

<p>
<label>Wrap Up Time</label><select class="select medium-input" type="text" name="wrap_up_time">
    <?php for($i=0;$i<=60;$i++)
    {   $selected="";
        if($qu['wrap_up_time']==$i) $selected=" selected ";
        echo "<option value= '".$i."' ".$selected.">".$i." Seconds</option>";
    }
    ?>

</select>
</p>

<p>
<label>Agent Announcement</label><select class="select medium-input" type="text" name="agent_announcement">
    <?php
    echo "<option value= '0'>Select Announcement</option>";
    foreach ($get_agent_announcement as $a)
    {   $selected="";
        if($qu['agent_announcement']==$a['id']) $selected=" selected ";
        echo "<option value= '".$a['id']."' ".$selected.">".$a['name']."</option>";     
    }
    ?>

</select>
</p>


<hr />

<p>
    <input class="button" type="submit" name="submit" value="Save" /> <input class="button" type="reset" value="Reset" />
</p>

</fieldset>

</form>

</div>
</div>
</div>

<!-- Body End -->

</div>
<?php 
} 
?>
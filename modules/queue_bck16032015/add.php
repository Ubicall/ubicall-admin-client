<?php
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;

$get_agent_announcement= $queue_manager->select_agent_announcement();
$get_agents=$queue_manager->select_agents();

if($_POST['submit'])
{
    echo "--------------------------------------------";    print_r($_POST['Queue']); //exit; 
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




?>
<script >
$(function(){
	$(".select-m").multiselect();
});
</script>
<div id="right-side">

<h2>Queues</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Add Queue</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">

    <form action="" method="POST">

<fieldset>

<p>
<label>Queue Name</label>
<input class="text-input large-input" type="text" name="name" required />
</p>

<hr />
<p>
<label>Queue Number</label>
<input class="text-input large-input" type="text" name="number" required />
</p>
<p>
<label>Queue Password</label>
<input class="text-input large-input" type="password" name="password" required  onchange=" if(this.checkValidity()) form.password2.pattern = this.value;" />
</p>
<p>
<label>Queue Password Retry</label>
<input class="text-input large-input" type="password" name="password2" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" />
</p>

<p>
<label>Wrap Up Time</label><select class="select medium-input" type="text" name="wrap_up_time">
    <?php for($i=0;$i<=60;$i++)
    {
        echo "<option value= '".$i."'>".$i." Seconds</option>";
    }
    ?>

</select>
</p>

<p>
<label>Agent Announcement</label><select class="select medium-input" type="text" name="agent_announcement">
    <?php
    echo "<option value= '0'>Select Announcement</option>";
    foreach ($get_agent_announcement as $a)
    {
        echo "<option value= '".$a['id']."'>".$a['name']."</option>";
    }
    ?>

</select>
</p>
<p>
<label>Select Queue</label>
<select class="select select-m medium-input" title="Select Queue" multiple="multiple" name="Queue[]">
    <?php
    foreach ($get_agents as $ag)
    {
        echo "<option value= '".$ag['id']."'>".$ag['name']."</option>";
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
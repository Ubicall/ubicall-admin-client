<?php
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;

$get_agent_announcement= $queue_manager->select_agent_announcement();
$get_join_announcement= $queue_manager->select_join_announcement();
$get_agents=$queue_manager->select_agents();

if($_POST['submit'])
{
   
    $name=$_POST['name'];
    $number=$_POST['number'];
    $password=$_POST['password'];
    $wrap_up_time=$_POST['wrap_up_time'];
    $agent_announcement=$_POST['agent_announcement'];
    $s_agent=implode (",", $_POST['s_agent']);
    $d_agent=implode (",", $_POST['d_agent']);
    
     //echo "--------------------------------------------";    print_r($s_agent); //exit; 
    
    $policy=$_POST['policy'];
    $cidname=$_POST['cidname'];
    $qweight=$_POST['qweight'];
    $music_on_hold=$_POST['music_on_hold'];
    $callrecording=$_POST['callrecording'];
    $caller_vol_adj=$_POST['caller_vol_adj'];
    $agent_vol_adj=$_POST['agent_vol_adj'];
    $autopause=$_POST['autopause'];
    $maxcallers=$_POST['maxcallers'];
    $joinempty=$_POST['joinempty'];
    $leaveempty=$_POST['leaveempty'];
    
    //add
    $queue_manager->add_queue($name,$number,$password,$wrap_up_time,$agent_announcement,$policy,$cidname,$qweight,$music_on_hold,
            $callrecording,$caller_vol_adj,$agent_vol_adj,$autopause,$maxcallers,$joinempty,$leaveempty,$s_agent,$d_agent);
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
<a href="index.php?pg=queue">View Queues</a>
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
<!--<p>
<label>Queue Password</label>
<input class="text-input large-input" type="password" name="password" required  onchange=" if(this.checkValidity()) form.password2.pattern = this.value;" />
</p>
<p>
<label>Queue Password Retry</label>
<input class="text-input large-input" type="password" name="password2" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" />
</p>-->

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
<label>Static Agent</label>
<select class="select select-m medium-input" title="Select Queue" multiple="multiple" name="s_agent[]">
    <?php
    foreach ($get_agents as $ag)
    {
        echo "<option value= '".$ag['id']."'>".$ag['name']."</option>";
    }
    ?>
</select>
</p>

<p>
<label>Dynamic Agent</label>
<select class="select select-m medium-input" title="Select Queue" multiple="multiple" name="d_agent[]">
    <?php
    foreach ($get_agents as $ag)
    {
        echo "<option value= '".$ag['id']."'>".$ag['name']."</option>";
    }
    ?>
</select>
</p>

<p>
<label>CID Name Prefix</label>
<input class="text-input small-input" type="text" name="cidname" />
</p>
<p>
<label>Ring Policy</label>
<select name="policy" class="select medium-input" title="Select policy">
    <option value="ringall" selected="">ringall</option>
    <option value="leastrecent">leastrecent</option>
    <option value="fewestcalls">fewestcalls</option>
    <option value="random">random</option>
    <option value="rrmemory">rrmemory</option>
    <option value="rrordered">rrordered</option>
    <option value="linear">linear</option>
    <option value="wrandom">wrandom</option>
</select>
</p>
<p>
<label>Queue Weight</label>
<select name="qweight" class="select medium-input">
    <?php for($i=0; $i<=10; $i++){ ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
     <?php } ?>
    
</select>
</p>

<p>
<label>Music on Hold Class</label>
<select name="music_on_hold" class="select medium-input" title="Select music">
    
    <option value="inherit" selected="">inherit</option>
    <option value="default">default</option>
    <option value="none">none</option>
    
</select>
</p> 
<p>
<label>Join Announcement</label>
<select name="join_announcement" class="select medium-input" title="Select Announcement">
    <?php
    echo "<option value= '0'>Select Announcement</option>";
    foreach ($get_join_announcement as $ja)
    {
        echo "<option value= '".$ja['id']."'>".$ja['name']."</option>";
    }
    ?>
</select>
</p>
<p>
<label>Call Recording</label>
<select name="callrecording" class="select medium-input" title="Select Announcement">
        <option value="" selected="">No</option>
	<option value="wav49">wav49</option>
        <option value="wav">wav</option>
        <option value="gsm">gsm</option>
</select>
</p> 
<p>
<label>Caller Volume Adjustment</label>
<select name="caller_vol_adj" class="select medium-input" title="Caller Volume Adjustment">
          <?php for($i=-4; $i<=4; $i++){ $selected=""; if($i==0) $selected="selected"; ?>
        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php if($i==0) echo "No Adjustment"; else  echo $i;  ?></option>
     <?php } ?>
        
</select>
</p>
<p>
<label>Agent Volume Adjustment</label>
<select name="agent_vol_adj" class="select medium-input" title="Agent Volume Adjustment">
          <?php for($i=-4; $i<=4; $i++){ $selected=""; if($i==0) $selected="selected"; ?>
        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php if($i==0) echo "No Adjustment";  else echo $i; ?></option>
          <?php } ?>
        
</select>
</p>

<p>
<label>Auto Pause</label>
<select name="autopause" class="select medium-input" title="Auto Pause">
        <option value="yes">Yes in this queue only</option>
        <option value="all">Yes in all queues</option>
        <option value="no" selected="">No</option>
        
</select>
</p>
<p>
<label>Max Callers</label>
<select name="maxcallers" class="select medium-input" title="Max Callers">
     <?php for($m = 0; $m <= 50; $m++ ){
            ?>
            <option value="<?php echo $m; ?>"><?php echo $m; ?></option>
    
     <?php } ?>
</select>
</p>

<p>
<label>Join Empty</label>
<select name="joinempty" class="select medium-input" title="Join Empty">

            <option value="yes" selected="">Yes</option>
            <option value="no">No</option>
            <option value="strict">Strict</option>
            <option value="penalty,paused,invalid,unavailable,inuse,ringing">Ultra Strict</option>
            <option value="loose">Loose</option>
</select>
</p>
<p>
<label>Leave Empty</label>
<select name="leaveempty" class="select medium-input" title="Leave Empty">

            <option value="no" selected="">No</option>
            <option value="yes">Yes</option>
            <option value="strict">Strict</option>
            <option value="penalty,paused,invalid,unavailable,inuse,ringing">Ultra Strict</option>
            <option value="loose">Loose</option>
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
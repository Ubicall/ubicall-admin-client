<?php
$id = $_GET['id'];
$db= new db_connector();
$conn= $db->connect();
include('modules/queue/class/queue_manager.php');
$queue_manager=new queue_manager;
$queue_manager->conn=$conn;

$get_agent_announcement= $queue_manager->select_agent_announcement();

$get_queue_by_id= $queue_manager->select_queue_by_id($id);
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
    $queue_manager->edit_queue($id,$name,$number,$password,$wrap_up_time,$agent_announcement,$policy,$cidname,$qweight,$music_on_hold,
            $callrecording,$caller_vol_adj,$agent_vol_adj,$autopause,$maxcallers,$joinempty,$leaveempty,$s_agent,$d_agent);
  
    echo "<script>alert('added !')</script>";
    	 echo" <script>
			window.location.href = 'index.php?pg=queue';
		</script>";
    
}


foreach ($get_queue_by_id as $qu)
{
    
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

<p>
<label>Static Agent</label>
<select class="select select-m medium-input" title="Select Queue" multiple="multiple" name="s_agent[]">
    <?php $get_s_agent=explode(",",$qu['s_agent']); 
    foreach ($get_agents as $ag)
    {
       $selected="";
       foreach($get_s_agent as $sa) { if($sa == $ag['id']) $selected="selected"; }
        echo "<option value= '".$ag['id']."' ".$selected.">".$ag['name']."</option>";
    }
    ?>
</select>
</p>

<p>
<label>Dynamic Agent </label>
<select class="select select-m medium-input" title="Select Queue" multiple="multiple" name="d_agent[]">
    <?php $get_d_agent=explode(",",$qu['d_agent']); 
    foreach ($get_agents as $ag)
    {   
        $selected="";
        foreach($get_d_agent as $da) { if($da == $ag['id']) $selected="selected"; }
        echo "<option value= '".$ag['id']."' ".$selected.">".$ag['name']."</option>";
    }
    ?>
</select>
</p>

<p>
<label>CID Name Prefix</label>
<input class="text-input small-input" type="text" name="cidname" value="<?php echo $qu['cidname'] ?>" />
</p>
<p>
<label>Ring Policy</label>
<select name="policy" class="select medium-input" title="Select policy">
    <option value="ringall" <?php if ($qu['policy']=="ringall") echo "selected"; ?> >ringall</option>
    <option value="leastrecent" <?php if ($qu['policy']=="leastrecent") echo "selected"; ?>>leastrecent</option>
    <option value="fewestcalls" <?php if ($qu['policy']=="fewestcalls") echo "selected"; ?>>fewestcalls</option>
    <option value="random" <?php if ($qu['policy']=="random") echo "selected"; ?>>random</option>
    <option value="rrmemory" <?php if ($qu['policy']=="rrmemory") echo "selected"; ?>>rrmemory</option>
    <option value="rrordered" <?php if ($qu['policy']=="rrordered") echo "selected"; ?>>rrordered</option>
    <option value="linear" <?php if ($qu['policy']=="linear") echo "selected"; ?>>linear</option>
    <option value="wrandom" <?php if ($qu['policy']=="wrandom") echo "selected"; ?>>wrandom</option>
</select>
</p>
<p>
<label>Queue Weight</label>
<select name="qweight" class="select medium-input">
    <?php for($i=0; $i<=10; $i++){ ?>
        <option value="<?php echo $i; ?>" <?php if($qu['qweight']==$i) echo "selected"; ?>><?php echo $i; ?></option>
     <?php } ?>
    
</select>
</p>

<p>
<label>Music on Hold Class</label>
<select name="music_on_hold" class="select medium-input" title="Select music">
    
    <option value="inherit" <?php if ($qu['music_on_hold']=="inherit") echo "selected"; ?>>inherit</option>
    <option value="default" <?php if ($qu['music_on_hold']=="default") echo "selected"; ?>>default</option>
    <option value="none" <?php if ($qu['music_on_hold']=="none") echo "selected"; ?>>none</option>
    
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
        <option value="" <?php if ($qu['callrecording']=="") echo "selected"; ?>>No</option>
	<option value="wav49" <?php if ($qu['callrecording']=="wav49") echo "selected"; ?>>wav49</option>
        <option value="wav" <?php if ($qu['callrecording']=="wav") echo "selected"; ?>>wav</option>
        <option value="gsm" <?php if ($qu['callrecording']=="gsm") echo "selected"; ?>>gsm</option>
</select>
</p> 
<p>
<label>Caller Volume Adjustment</label>
<select name="caller_vol_adj" class="select medium-input" title="Caller Volume Adjustment">
          <?php for($i=-4; $i<=4; $i++){ $selected=""; if($i==$qu['caller_vol_adj']) $selected="selected"; ?>
        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php if($i==0) echo "No Adjustment"; else  echo $i;  ?></option>
     <?php } ?>
        
</select>
</p>
<p>
<label>Agent Volume Adjustment</label>
<select name="agent_vol_adj" class="select medium-input" title="Agent Volume Adjustment">
          <?php for($i=-4; $i<=4; $i++){ $selected=""; if($i==$qu['agent_vol_adj']) $selected="selected"; ?>
        <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php if($i==0) echo "No Adjustment";  else echo $i; ?></option>
          <?php } ?>
        
</select>
</p>

<p>
<label>Auto Pause</label>
<select name="autopause" class="select medium-input" title="Auto Pause">
        <option value="yes" <?php if ($qu['autopause']=="") echo "selected"; ?>>Yes in this queue only</option>
        <option value="all" <?php if ($qu['autopause']=="") echo "selected"; ?>>Yes in all queues</option>
        <option value="no" <?php if ($qu['autopause']=="") echo "selected"; ?>>No</option>
        
</select>
</p>
<p>
<label>Max Callers</label>
<select name="maxcallers" class="select medium-input" title="Max Callers">
     <?php for($m = 0; $m <= 50; $m++ ){ $selected=""; if($m==$qu['maxcallers']) $selected="selected"; ?>
            ?>
            <option value="<?php echo $m; ?>" <?php echo $selected; ?>><?php echo $m; ?></option>
    
     <?php } ?>
</select>
</p>

<p>
<label>Join Empty</label>
<select name="joinempty" class="select medium-input" title="Join Empty">

            <option value="yes" <?php if ($qu['joinempty']=="yes") echo "selected"; ?>>Yes</option>
            <option value="no" <?php if ($qu['joinempty']=="no") echo "selected"; ?>>No</option>
            <option value="strict" <?php if ($qu['joinempty']=="strict") echo "selected"; ?>>Strict</option>
            <option value="penalty,paused,invalid,unavailable,inuse,ringing" <?php if ($qu['joinempty']=="penalty,paused,invalid,unavailable,inuse,ringing") echo "selected"; ?>>Ultra Strict</option>
            <option value="loose" <?php if ($qu['joinempty']=="loose") echo "selected"; ?>>Loose</option>
</select>
</p>
<p>
<label>Leave Empty</label>
<select name="leaveempty" class="select medium-input" title="Leave Empty">

            <option value="no" <?php if ($qu['leaveempty']=="no") echo "selected"; ?>>No</option>
            <option value="yes" <?php if ($qu['leaveempty']=="yes") echo "selected"; ?>>Yes</option>
            <option value="strict" <?php if ($qu['leaveempty']=="strict") echo "selected"; ?>>Strict</option>
            <option value="penalty,paused,invalid,unavailable,inuse,ringing" <?php if ($qu['leaveempty']=="penalty,paused,invalid,unavailable,inuse,ringing") echo "selected"; ?>>Ultra Strict</option>
            <option value="loose" <?php if ($qu['leaveempty']=="loose") echo "selected"; ?>>Loose</option>
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
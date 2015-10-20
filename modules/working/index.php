<?php

//error_reporting(E_ALL);
$db= new db_connector();
$conn= $db->connect();
include('class/whours_manager.php');
$whours_manager = new whours_manager;
$whours_manager->conn=$conn;


$client_id = $_SESSION['admin_user'];


?>

<?php

if(isset($_POST["add_wh"]))
{    

// {sun_to_ho,sun_to_min,satr_to_ho,satr_to_min,fri_to_ho,fri_to_min,thur_to_ho,thur_to_min,  
//          wed_to_ho,wed_to_min,tues_to_ho,tues_to_min
//       }
  
    
    $queue_id  = "";

    $time_zone_details = explode("/", $_POST['time_zone']);
     $time_zone = $time_zone_details[1];
     $offset    = $time_zone_details[0];

    $day_0 = $_POST['mon_w'];
     $day_0_start_h = $_POST['mon_from_ho'];
     $day_0_start_m = $_POST['mon_from_min'];
     $day_0_end_h   = $_POST['mon_to_ho'];
     $day_0_end_m   = $_POST['mon_to_min'];

     $day_0_start = $day_0_start_h.":".$day_0_start_m; 
     $day_0_end   = $day_0_end_h.":".$day_0_end_m;

    $day_1 = $_POST['tues_w'];
     $day_1_start_h = $_POST['tues_from_ho'];
     $day_1_start_m = $_POST['tues_from_min'];
     $day_1_end_h   = $_POST['tues_to_ho'];
     $day_1_end_m   = $_POST['tues_to_min'];
     
     $day_1_start = $day_1_start_h.":".$day_1_start_m; 
     $day_1_end   = $day_1_end_h.":".$day_1_end_m;
   
    $day_2 = $_POST['wed_w'];
     $day_2_start_h = $_POST['wed_from_ho'];
     $day_2_start_m = $_POST['wed_from_min'];
     $day_2_end_h   = $_POST['wed_to_ho'];
     $day_2_end_m   = $_POST['wed_to_min'];

     $day_2_start = $day_2_start_h.":".$day_2_start_m; 
     $day_2_end   = $day_2_end_h.":".$day_2_end_m;

    $day_3 = $_POST['thur_w'];
     $day_3_start_h = $_POST['thur_from_ho'];
     $day_3_start_m = $_POST['thur_from_min'];
     $day_3_end_h   = $_POST['thur_to_ho'];
     $day_3_end_m   = $_POST['thur_to_min'];
  
     $day_3_start = $day_3_start_h.":".$day_3_start_m; 
     $day_3_end   = $day_3_end_h.":".$day_3_end_m; 

    $day_4 = $_POST['fri_w'];
      $day_4_start_h = $_POST['fri_from_ho'];
      $day_4_start_m = $_POST['fri_from_min'];
      $day_4_end_h   = $_POST['fri_to_ho'];
      $day_4_end_m   = $_POST['fri_to_min'];
    
      $day_4_start = $day_4_start_h.":".$day_4_start_m; 
      $day_4_end   = $day_4_end_h.":".$day_4_end_m;

    $day_5 = $_POST['satr_w'];
      $day_5_start_h = $_POST['satr_from_ho'];
      $day_5_start_m = $_POST['satr_from_min'];
      $day_5_end_h   = $_POST['satr_to_ho'];
      $day_5_end_m   = $_POST['satr_to_min'];

      $day_5_start = $day_5_start_h.":".$day_5_start_m; 
      $day_5_end   = $day_5_end_h.":".$day_5_end_m;

    $day_6 = $_POST['sun_w'];
      $day_6_start_h = $_POST['sun_from_ho'];
      $day_6_start_m = $_POST['sun_from_min'];
      $day_6_end_h   = $_POST['sun_to_ho'];
      $day_6_end_m   = $_POST['sun_to_min'];

      $day_6_start = $day_6_start_h.":".$day_6_start_m; 
      $day_6_end   = $day_6_end_h.":".$day_6_end_m;
    
    //add
    $add_wh = $whours_manager->add_wh($client_id,$queue_id,$time_zone,$offset,
                        $day_0,$day_0_start,$day_0_end,
                        $day_1,$day_1_start,$day_1_end,$day_2,$day_2_start,$day_2_end,
                        $day_3,$day_3_start,$day_3_end,$day_4,$day_4_start,$day_4_end,
                        $day_5,$day_5_start,$day_5_end,$day_6,$day_6_start,$day_6_end);

$success="1";
echo "<script>window.location.href'index.php?pg=whours';</script>";
    
}    //////////////////////// End Of Add Working Hours ///////////////
 

if(isset($_POST["update_wh"]))
{    
    
   // $queue_id  = "";

    $time_zone_details = explode("/", $_POST['time_zone']);
     $time_zone = $time_zone_details[1];
     $offset    = $time_zone_details[0];

    $day_0 = $_POST['mon_w'];
     $day_0_start_h = $_POST['mon_from_ho'];
     $day_0_start_m = $_POST['mon_from_min'];
     $day_0_end_h   = $_POST['mon_to_ho'];
     $day_0_end_m   = $_POST['mon_to_min'];

     $day_0_start = $day_0_start_h.":".$day_0_start_m; 
     $day_0_end   = $day_0_end_h.":".$day_0_end_m;

    $day_1 = $_POST['tues_w'];
     $day_1_start_h = $_POST['tues_from_ho'];
     $day_1_start_m = $_POST['tues_from_min'];
     $day_1_end_h   = $_POST['tues_to_ho'];
     $day_1_end_m   = $_POST['tues_to_min'];
     
     $day_1_start = $day_1_start_h.":".$day_1_start_m; 
     $day_1_end   = $day_1_end_h.":".$day_1_end_m;
   
    $day_2 = $_POST['wed_w'];
     $day_2_start_h = $_POST['wed_from_ho'];
     $day_2_start_m = $_POST['wed_from_min'];
     $day_2_end_h   = $_POST['wed_to_ho'];
     $day_2_end_m   = $_POST['wed_to_min'];

     $day_2_start = $day_2_start_h.":".$day_2_start_m; 
     $day_2_end   = $day_2_end_h.":".$day_2_end_m;

    $day_3 = $_POST['thur_w'];
     $day_3_start_h = $_POST['thur_from_ho'];
     $day_3_start_m = $_POST['thur_from_min'];
     $day_3_end_h   = $_POST['thur_to_ho'];
     $day_3_end_m   = $_POST['thur_to_min'];
  
     $day_3_start = $day_3_start_h.":".$day_3_start_m; 
     $day_3_end   = $day_3_end_h.":".$day_3_end_m; 

    $day_4 = $_POST['fri_w'];
      $day_4_start_h = $_POST['fri_from_ho'];
      $day_4_start_m = $_POST['fri_from_min'];
      $day_4_end_h   = $_POST['fri_to_ho'];
      $day_4_end_m   = $_POST['fri_to_min'];
    
      $day_4_start = $day_4_start_h.":".$day_4_start_m; 
      $day_4_end   = $day_4_end_h.":".$day_4_end_m;

    $day_5 = $_POST['satr_w'];
      $day_5_start_h = $_POST['satr_from_ho'];
      $day_5_start_m = $_POST['satr_from_min'];
      $day_5_end_h   = $_POST['satr_to_ho'];
      $day_5_end_m   = $_POST['satr_to_min'];

      $day_5_start = $day_5_start_h.":".$day_5_start_m; 
      $day_5_end   = $day_5_end_h.":".$day_5_end_m;

    $day_6 = $_POST['sun_w'];
      $day_6_start_h = $_POST['sun_from_ho'];
      $day_6_start_m = $_POST['sun_from_min'];
      $day_6_end_h   = $_POST['sun_to_ho'];
      $day_6_end_m   = $_POST['sun_to_min'];

      $day_6_start = $day_6_start_h.":".$day_6_start_m; 
      $day_6_end   = $day_6_end_h.":".$day_6_end_m;
    
    //add
    $update_wh = $whours_manager->update_wh($client_id,$time_zone,$offset,
                        $day_0,$day_0_start,$day_0_end,
                        $day_1,$day_1_start,$day_1_end,$day_2,$day_2_start,$day_2_end,
                        $day_3,$day_3_start,$day_3_end,$day_4,$day_4_start,$day_4_end,
                        $day_5,$day_5_start,$day_5_end,$day_6,$day_6_start,$day_6_end);

$updates="1";
    echo "<script>window.location.href'index.php?pg=whours';</script>";
}   ///////////////////// End Of Update Working Hours ///////////////////////


?>

<?php 

$get_client_wh = $whours_manager->get_whs($client_id);
if($get_client_wh){
  foreach($get_client_wh as $client_w_h){
//print_r($client_w_h);
  }
}

?>


<style>

.radiobut {
    display: inline-block;
    cursor: pointer;
    position: relative;
    padding-left: 0px;
    margin-right: 15px;
    font-size: 13px;
    width:30px !important;
}
.radio{
  margin-bottom: 20px;
}
.work_hours{
  width:40px;
}
#mon_select_time,#tues_select_time,#wed_select_time,
#thur_select_time,#fri_select_time,#satr_select_time,#sun_select_time{
  float: right;
  width: 580px;
}
form .small-input{
  width: 15% !important;
}

select.small-input{
  color: #ccc;
}
</style>

<script >
$(function(){
  $(".select-m").multiselect();
});

$(document).ready(function() {

  if($("input[type=radio][name='mon_w']:checked").val() == "1"){
    
    $("#mon_select_time .small-input").css("color","#313131");
           
            $("#mon_from_h").removeAttr('readonly');
            $("#mon_from_m").removeAttr('readonly');
            $("#mon_to_h").removeAttr('readonly');
            $("#mon_to_m").removeAttr('readonly');
          }else{

            $("#mon_select_time .small-input").css("color","#cccccc");
            $("#mon_from_h").attr('readonly', 'readonly');
            $("#mon_from_m").attr('readonly', 'readonly');
            $("#mon_to_h").attr('readonly', 'readonly');
            $("#mon_to_m").attr('readonly', 'readonly'); 

          }

if($("input[type=radio][name='tues_w']:checked").val() == "1"){
$("#tues_select_time .small-input").css("color","#313131");
           
            $("#tues_from_h").removeAttr('readonly');
            $("#tues_from_m").removeAttr('readonly');
            $("#tues_to_h").removeAttr('readonly');
            $("#tues_to_m").removeAttr('readonly');
}
if($("input[type=radio][name='wed_w']:checked").val() == "1"){
$("#wed_select_time .small-input").css("color","#313131");
           
            $("#wed_from_h").removeAttr('readonly');
            $("#wed_from_m").removeAttr('readonly');
            $("#wed_to_h").removeAttr('readonly');
            $("#wed_to_m").removeAttr('readonly');
}
if($("input[type=radio][name='thur_w']:checked").val() == "1"){
$("#thur_select_time .small-input").css("color","#313131");
           
            $("#thur_from_h").removeAttr('readonly');
            $("#thur_from_m").removeAttr('readonly');
            $("#thur_to_h").removeAttr('readonly');
            $("#thur_to_m").removeAttr('readonly');
}
if($("input[type=radio][name='fri_w']:checked").val() == "1"){
$("#fri_select_time .small-input").css("color","#313131");
           
            $("#fri_from_h").removeAttr('readonly');
            $("#fri_from_m").removeAttr('readonly');
            $("#fri_to_h").removeAttr('readonly');
            $("#fri_to_m").removeAttr('readonly');
}
if($("input[type=radio][name='satr_w']:checked").val() == "1"){
$("#satr_select_time .small-input").css("color","#313131");
           
            $("#satr_from_h").removeAttr('readonly');
            $("#satr_from_m").removeAttr('readonly');
            $("#satr_to_h").removeAttr('readonly');
            $("#satr_to_m").removeAttr('readonly');
}
if($("input[type=radio][name='sun_w']:checked").val() == "1"){
$("#sun_select_time .small-input").css("color","#313131");
           
            $("#sun_from_h").removeAttr('readonly');
            $("#sun_from_m").removeAttr('readonly');
            $("#sun_to_h").removeAttr('readonly');
            $("#sun_to_m").removeAttr('readonly');
}

//////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////





   $('input[type="radio"]').click(function() {

    /************* sun_select_time **************/

       if($(this).attr('id') == 'sun_w_on') {
       //      $('#sun_select_time').show();           
       // }
       // else if ($(this).attr('id') == 'sun_w_off') {
       //      $('#sun_select_time').hide();
             
       // }

           $("#sun_select_time .small-input").css("color","#313131");
           
            $("#sun_from_h").removeAttr('readonly');
            $("#sun_from_m").removeAttr('readonly');
            $("#sun_to_h").removeAttr('readonly');
            $("#sun_to_m").removeAttr('readonly');    
       }
       else if ($(this).attr('id') == 'sun_w_off') {
            $("#sun_select_time .small-input").css("color","#ccc");
            $("#sun_from_h").attr('readonly', 'readonly');
            $("#sun_from_m").attr('readonly', 'readonly');
            $("#sun_to_h").attr('readonly', 'readonly');
            $("#sun_to_m").attr('readonly', 'readonly'); 

       }

   /************* mon_select_time **************/

       if($(this).attr('id') == 'mon_w_on') {
           // $('#mon_select_time').show();
           $("#mon_select_time .small-input").css("color","#313131");
           
            $("#mon_from_h").removeAttr('readonly');
            $("#mon_from_m").removeAttr('readonly');
            $("#mon_to_h").removeAttr('readonly');
            $("#mon_to_m").removeAttr('readonly');
            

       }
       else if ($(this).attr('id') == 'mon_w_off') {
            $("#mon_select_time .small-input").css("color","#cccccc");
            $("#mon_from_h").attr('readonly', 'readonly');
            $("#mon_from_m").attr('readonly', 'readonly');
            $("#mon_to_h").attr('readonly', 'readonly');
            $("#mon_to_m").attr('readonly', 'readonly'); 

       }


    /************* satr_select_time **************/

       if($(this).attr('id') == 'satr_w_on') {
        $("#satr_select_time .small-input").css("color","#313131");
           
            $("#satr_from_h").removeAttr('readonly');
            $("#satr_from_m").removeAttr('readonly');
            $("#satr_to_h").removeAttr('readonly');
            $("#satr_to_m").removeAttr('readonly');
            

       }
       else if ($(this).attr('id') == 'satr_w_off') {
            $("#satr_select_time .small-input").css("color","#cccccc");
            $("#satr_from_h").attr('readonly', 'readonly');
            $("#satr_from_m").attr('readonly', 'readonly');
            $("#satr_to_h").attr('readonly', 'readonly');
            $("#satr_to_m").attr('readonly', 'readonly'); 

       }
   /************* fri_select_time **************/

       if($(this).attr('id') == 'fri_w_on') {
        $("#fri_select_time .small-input").css("color","#313131");
           
            $("#fri_from_h").removeAttr('readonly');
            $("#fri_from_m").removeAttr('readonly');
            $("#fri_to_h").removeAttr('readonly');
            $("#fri_to_m").removeAttr('readonly');
            

       }
       else if ($(this).attr('id') == 'fri_w_off') {
            $("#fri_select_time .small-input").css("color","#cccccc");
            $("#fri_from_h").attr('readonly', 'readonly');
            $("#fri_from_m").attr('readonly', 'readonly');
            $("#fri_to_h").attr('readonly', 'readonly');
            $("#fri_to_m").attr('readonly', 'readonly'); 

       }

    /************* thur_select_time **************/

       if($(this).attr('id') == 'thur_w_on') {
          $("#thur_select_time .small-input").css("color","#313131");
           
            $("#thur_from_h").removeAttr('readonly');
            $("#thur_from_m").removeAttr('readonly');
            $("#thur_to_h").removeAttr('readonly');
            $("#thur_to_m").removeAttr('readonly');
       }
       else if ($(this).attr('id') == 'thur_w_off') {
            $("#thur_select_time .small-input").css("color","#cccccc");
            $("#thur_from_h").attr('readonly', 'readonly');
            $("#thur_from_m").attr('readonly', 'readonly');
            $("#thur_to_h").attr('readonly', 'readonly');
            $("#thur_to_m").attr('readonly', 'readonly'); 

       }

    /************* wed_select_time **************/

       if($(this).attr('id') == 'wed_w_on') {
          $("#wed_select_time .small-input").css("color","#313131");
           
            $("#wed_from_h").removeAttr('readonly');
            $("#wed_from_m").removeAttr('readonly');
            $("#wed_to_h").removeAttr('readonly');
            $("#wed_to_m").removeAttr('readonly');
       }
       else if ($(this).attr('id') == 'wed_w_off') {
            $("#wed_select_time .small-input").css("color","#cccccc");
            $("#wed_from_h").attr('readonly', 'readonly');
            $("#wed_from_m").attr('readonly', 'readonly');
            $("#wed_to_h").attr('readonly', 'readonly');
            $("#wed_to_m").attr('readonly', 'readonly'); 

       }

    /************* tues_select_time **************/

       if($(this).attr('id') == 'tues_w_on') {
            $("#tues_select_time .small-input").css("color","#313131");
           
            $("#tues_from_h").removeAttr('readonly');
            $("#tues_from_m").removeAttr('readonly');
            $("#tues_to_h").removeAttr('readonly');
            $("#tues_to_m").removeAttr('readonly');
       }
       else if ($(this).attr('id') == 'tues_w_off') {
            $("#tues_select_time .small-input").css("color","#cccccc");
            $("#tues_from_h").attr('readonly', 'readonly');
            $("#tues_from_m").attr('readonly', 'readonly');
            $("#tues_to_h").attr('readonly', 'readonly');
            $("#tues_to_m").attr('readonly', 'readonly'); 

       }

   
   });
});
</script>
<div id="right-side">

<h2>Working Hours</h2>

<div class="clear"></div>


<!-- Body -->

<div class="content-box">
<div class="content-box-header">
<h3>Add Working Hours</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<?php 
if($success =="1"){
  echo "<h3>Thanks, Your working Hours added.</h3>";
}
if($updates =="1"){
  echo "<h3>Great, Your working Hours updated.</h3>";
}

?>
<form action="" id="signupForm" method="POST">

<fieldset>

<!----------------- Time Zone -------------------->

<p>
<label>Time Zone</label>
<div>
 <select name="time_zone" class="select large-input" title="From">

  <option timeZoneId="1" gmtAdjustment="GMT-12:00" useDaylightTime="0" value="-12/International Date Line West" <?php if($client_w_h["time_zone"] == "International Date Line West"){ echo "selected";} ?>>(GMT-12:00) International Date Line West</option>
  
  <option timeZoneId="2" gmtAdjustment="GMT-11:00" useDaylightTime="0" value="-11/Midway Island, Samoa" <?php if($client_w_h["time_zone"] == "Midway Island, Samoa"){ echo "selected";} ?>>(GMT-11:00) Midway Island, Samoa
  </option>

  <option timeZoneId="3" gmtAdjustment="GMT-10:00" useDaylightTime="0" value="-10/Hawaii"  
  <?php if($client_w_h["time_zone"] == "Hawaii"){ echo "selected";} ?>>
  (GMT-10:00) Hawaii
</option>
<option timeZoneId="4" gmtAdjustment="GMT-09:00" useDaylightTime="1" value="-9/Alaska" 
<?php if($client_w_h["time_zone"] == "Alaska"){ echo "selected";} ?>>(GMT-09:00) Alaska
</option>

<option timeZoneId="5" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8/Pacific Time (US & Canada)" <?php if($client_w_h["time_zone"] == "Pacific Time (US & Canada)"){ echo "selected";} ?>>(GMT-08:00) Pacific Time (US & Canada)
</option>

<option timeZoneId="6" gmtAdjustment="GMT-08:00" useDaylightTime="1" value="-8/Tijuana, Baja California" <?php if($client_w_h["time_zone"] == "Tijuana, Baja California"){ echo "selected";} ?>>(GMT-08:00) Tijuana, Baja California
</option>

<option timeZoneId="7" gmtAdjustment="GMT-07:00" useDaylightTime="0" value="-7/Arizona" 
<?php if($client_w_h["time_zone"] == "Arizona"){ echo "selected";} ?>>
(GMT-07:00) Arizona
</option>

<option timeZoneId="8" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7/Chihuahua, La Paz, Mazatlan" <?php if($client_w_h["time_zone"] == "Chihuahua, La Paz, Mazatlan")
{ echo "selected";} ?>>(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>

<option timeZoneId="9" gmtAdjustment="GMT-07:00" useDaylightTime="1" value="-7/Mountain Time (US & Canada)" <?php if($client_w_h["time_zone"] == "Mountain Time (US & Canada)")
{ echo "selected";} ?>>(GMT-07:00) Mountain Time (US & Canada)
</option>

<option timeZoneId="10" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6/Central America" <?php if($client_w_h["time_zone"] == "Central America"){ echo "selected";} ?>>
  (GMT-06:00) Central America</option>

  <option timeZoneId="11" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6/Central Time (US & Canada)" <?php if($client_w_h["time_zone"] == "Central Time (US & Canada)")
  { echo "selected";} ?>>(GMT-06:00) Central Time (US & Canada)
</option>

<option timeZoneId="12" gmtAdjustment="GMT-06:00" useDaylightTime="1" value="-6/Guadalajara, Mexico City, Monterrey" <?php if($client_w_h["time_zone"] == "Guadalajara, Mexico City, Monterrey"){ echo "selected";} ?>>(GMT-06:00) Guadalajara, Mexico City, Monterrey
</option>

<option timeZoneId="13" gmtAdjustment="GMT-06:00" useDaylightTime="0" value="-6/Saskatchewan" 
 <?php if($client_w_h["time_zone"] == "Saskatchewan"){ echo "selected";} ?>>
(GMT-06:00) Saskatchewan
</option>

<option timeZoneId="14" gmtAdjustment="GMT-05:00" useDaylightTime="0" value="-5/Bogota, Lima, Quito, Rio Branco" <?php if($client_w_h["time_zone"] == "Bogota, Lima, Quito, Rio Branco")
{ echo "selected";} ?>>(GMT-05:00) Bogota, Lima, Quito, Rio Branco
</option>

<option timeZoneId="15" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5/Eastern Time (US & Canada)" <?php if($client_w_h["time_zone"] == "Eastern Time (US & Canada)")
{ echo "selected";} ?>>(GMT-05:00) Eastern Time (US & Canada)
</option>

<option timeZoneId="16" gmtAdjustment="GMT-05:00" useDaylightTime="1" value="-5/Indiana (East)"  <?php if($client_w_h["time_zone"] == "Indiana (East)"){ echo "selected";} ?>>
(GMT-05:00) Indiana (East)
</option>

<option timeZoneId="17" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4/Atlantic Time (Canada)" <?php if($client_w_h["time_zone"] == "Atlantic Time (Canada)"){ echo "selected";} ?>>
  (GMT-04:00) Atlantic Time (Canada)
</option>

<option timeZoneId="18" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4/Caracas, La Paz" <?php if($client_w_h["time_zone"] == "Caracas, La Paz"){ echo "selected";} ?>>
  (GMT-04:00) Caracas, La Paz
</option>

<option timeZoneId="19" gmtAdjustment="GMT-04:00" useDaylightTime="0" value="-4/Manaus"
 <?php if($client_w_h["time_zone"] == "Manaus"){ echo "selected";} ?>>(GMT-04:00) Manaus
</option>

<option timeZoneId="20" gmtAdjustment="GMT-04:00" useDaylightTime="1" value="-4/Santiago" <?php if($client_w_h["time_zone"] == "Santiago"){ echo "selected";} ?>>(GMT-04:00) Santiago
</option>

<option timeZoneId="21" gmtAdjustment="GMT-03:30" useDaylightTime="1" value="-3.5/Newfoundland"
<?php if($client_w_h["time_zone"] == "Newfoundland"){ echo "selected";} ?> >(GMT-03:30) Newfoundland
</option>

<option timeZoneId="22" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3/Brasilia" <?php if($client_w_h["time_zone"] == "Brasilia"){ echo "selected";} ?>>(GMT-03:00) Brasilia
</option>

<option timeZoneId="23" gmtAdjustment="GMT-03:00" useDaylightTime="0" value="-3/Buenos Aires, Georgetown" <?php if($client_w_h["time_zone"] == "Buenos Aires, Georgetown"){ echo "selected";} 
?>
>(GMT-03:00) Buenos Aires, Georgetown</option>

<option timeZoneId="24" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3/Greenland" 
<?php if($client_w_h["time_zone"] == "Greenland"){ echo "selected";} ?>>(GMT-03:00) Greenland
</option>

<option timeZoneId="25" gmtAdjustment="GMT-03:00" useDaylightTime="1" value="-3/Montevideo" 
<?php if($client_w_h["time_zone"] == "Montevideo"){ echo "selected";} ?>>
  (GMT-03:00) Montevideo
</option>

<option timeZoneId="26" gmtAdjustment="GMT-02:00" useDaylightTime="1" value="-2/Mid-Atlantic" 
<?php if($client_w_h["time_zone"] == "Mid-Atlantic"){ echo "selected";} ?>>
(GMT-02:00) Mid-Atlantic
</option>

<option timeZoneId="27" gmtAdjustment="GMT-01:00" useDaylightTime="0" value="-1/Cape Verde Is" 
<?php if($client_w_h["time_zone"] == "Cape Verde Is"){ echo "selected";} ?>>
(GMT-01:00) Cape Verde Is.</option>

<option timeZoneId="28" gmtAdjustment="GMT-01:00" useDaylightTime="1" value="-1/Azores" 
<?php if($client_w_h["time_zone"] == "Azores"){ echo "selected";} ?>>(GMT-01:00) Azores
</option>

<option timeZoneId="29" gmtAdjustment="GMT+00" useDaylightTime="0" value="0/Casablanca, Monrovia, Reykjavik" <?php if($client_w_h["time_zone"] == "Casablanca, Monrovia, Reykjavik")
{ echo "selected";} ?>>(GMT+00) Casablanca, Monrovia, Reykjavik
</option>

<option timeZoneId="30" gmtAdjustment="GMT+00" useDaylightTime="1" value="0/Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London" 
<?php if($client_w_h["time_zone"] == "reenwich Mean Time : Dublin, Edinburgh, Lisbon, London")
{ echo "selected";} ?>>
(GMT+00) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London
</option>

  <option timeZoneId="31" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1/Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna" <?php if($client_w_h["time_zone"] == "Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna"){ echo "selected";} ?>>

  (GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna
</option>

  <option timeZoneId="32" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1/Belgrade,Bratislava, Budapest, Ljubljana, Prague" <?php if($client_w_h["time_zone"] == "Belgrade,Bratislava, Budapest, Ljubljana, Prague"){ echo "selected";} ?>>

  (GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>

  <option timeZoneId="33" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1/Brussels,Copenhagen, Madrid, Paris"
  <?php if($client_w_h["time_zone"] == "Brussels,Copenhagen, Madrid, Paris")
  { echo "selected";} ?>>(GMT+01:00) Brussels, Copenhagen, Madrid, Paris
</option>

<option timeZoneId="34" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1/Sarajevo, Skopje, Warsaw, Zagreb" <?php if($client_w_h["time_zone"] == "Sarajevo, Skopje, Warsaw, Zagreb")
{ echo "selected";} ?>>(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb
</option>

<option timeZoneId="35" gmtAdjustment="GMT+01:00" useDaylightTime="1" value="1/West Central Africa" <?php if($client_w_h["time_zone"] == "West Central Africa"){ echo "selected";} ?>>
  (GMT+01:00) West Central Africa</option>

<option timeZoneId="36" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Amman" 
<?php if($client_w_h["time_zone"] == "Amman"){ echo "selected";} ?>>
(GMT+02:00) Amman
</option>

<option timeZoneId="37" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Athens, Bucharest, Istanbul" <?php if($client_w_h["time_zone"] == "Athens, Bucharest, Istanbul")
{ echo "selected";} ?>>(GMT+02:00) Athens, Bucharest, Istanbul</option>

<option timeZoneId="38" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Beirut" <?php if($client_w_h["time_zone"] == "Beirut"){ echo "selected";} ?>>
  (GMT+02:00) Beirut
</option>

<option timeZoneId="39" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Cairo" 
<?php if($client_w_h["time_zone"] == "Cairo"){ echo "selected";} ?>>(GMT+02:00) Cairo
</option>

<option timeZoneId="40" gmtAdjustment="GMT+02:00" useDaylightTime="0" value="2/Harare, Pretoria" <?php if($client_w_h["time_zone"] == "Harare, Pretoria"){ echo "selected";} ?>>(GMT+02:00) Harare, Pretoria
</option>

<option timeZoneId="41" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius" <?php if($client_w_h["time_zone"] == "Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius"){ echo "selected";} ?>>
  (GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius
</option>

<option timeZoneId="42" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Jerusalem" <?php if($client_w_h["time_zone"] == "Jerusalem"){ echo "selected";} ?>>
(GMT+02:00) Jerusalem</option>

<option timeZoneId="43" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Minsk" 
<?php if($client_w_h["time_zone"] == "Minsk"){ echo "selected";} ?>>(GMT+02:00) Minsk
</option>

<option timeZoneId="44" gmtAdjustment="GMT+02:00" useDaylightTime="1" value="2/Windhoek" 
<?php if($client_w_h["time_zone"] == "Windhoek"){ echo "selected";} ?>>(GMT+02:00) Windhoek
</option>

<option timeZoneId="45" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3/Kuwait, Riyadh, Baghdad" <?php if($client_w_h["time_zone"] == "Kuwait, Riyadh, Baghdad"){ echo "selected";} ?>>
  (GMT+03:00) Kuwait, Riyadh, Baghdad</option>

<option timeZoneId="46" gmtAdjustment="GMT+03:00" useDaylightTime="1" value="3/Moscow, St. Petersburg, Volgograd" <?php if($client_w_h["time_zone"] == "Moscow, St. Petersburg, Volgograd"){ echo "selected";} ?>>(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>

<option timeZoneId="47" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3/Nairobi" 
<?php if($client_w_h["time_zone"] == "Nairobi"){ echo "selected";} ?>>
  (GMT+03:00) Nairobi
</option>

<option timeZoneId="48" gmtAdjustment="GMT+03:00" useDaylightTime="0" value="3/Tbilisi" 
<?php if($client_w_h["time_zone"] == "Tbilisi"){ echo "selected";} ?>>
(GMT+03:00) Tbilisi</option>

<option timeZoneId="49" gmtAdjustment="GMT+03:30" useDaylightTime="1" value="3.5/Tehran" 
<?php if($client_w_h["time_zone"] == "Tehran"){ echo "selected";} ?>>(GMT+03:30) Tehran
</option>

<option timeZoneId="50" gmtAdjustment="GMT+04:00" useDaylightTime="0" value="4/Abu Dhabi, Muscat" <?php if($client_w_h["time_zone"] == "Abu Dhabi, Muscat"){ echo "selected";} ?>>(GMT+04:00) Abu Dhabi, Muscat
</option>

<option timeZoneId="51" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4/Baku" 
<?php if($client_w_h["time_zone"] == "Baku"){ echo "selected";} ?>>
(GMT+04:00) Baku</option>

<option timeZoneId="52" gmtAdjustment="GMT+04:00" useDaylightTime="1" value="4/Yerevan" 
<?php if($client_w_h["time_zone"] == "Yerevan"){ echo "selected";} ?>>
(GMT+04:00) Yerevan
</option>

<option timeZoneId="53" gmtAdjustment="GMT+04:30" useDaylightTime="0" value="4.5/Kabul" 
<?php if($client_w_h["time_zone"] == "Kabul"){ echo "selected";} ?>>
(GMT+04:30) Kabul
</option>

<option timeZoneId="54" gmtAdjustment="GMT+05:00" useDaylightTime="1" value="5/Yekaterinburg" 
<?php if($client_w_h["time_zone"] == "Yekaterinburg"){ echo "selected";} ?>>
(GMT+05:00) Yekaterinburg
</option>

<option timeZoneId="55" gmtAdjustment="GMT+05:00" useDaylightTime="0" value="5/Islamabad, Karachi, Tashkent" <?php if($client_w_h["time_zone"] == "Islamabad, Karachi, Tashkent")
{ echo "selected";} ?>>(GMT+05:00) Islamabad, Karachi, Tashkent
</option>
<option timeZoneId="56" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5/Sri Jayawardenapura" <?php if($client_w_h["time_zone"] == "Sri Jayawardenapura")
{ echo "selected";} ?>>(GMT+05:30) Sri Jayawardenapura
</option>

<option timeZoneId="57" gmtAdjustment="GMT+05:30" useDaylightTime="0" value="5.5/Chennai, Kolkata, Mumbai, New Delhi" <?php if($client_w_h["time_zone"] == "Chennai, Kolkata, Mumbai, New Delhi"){ echo "selected";} ?>>
  (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi
</option>

<option timeZoneId="58" gmtAdjustment="GMT+05:45" useDaylightTime="0" value="5.75/Kathmandu" 
<?php if($client_w_h["time_zone"] == "Kathmandu"){ echo "selected";} ?>>
(GMT+05:45) Kathmandu
</option>

<option timeZoneId="59" gmtAdjustment="GMT+06:00" useDaylightTime="1" value="6/Almaty, Novosibirsk" <?php if($client_w_h["time_zone"] == "Almaty, Novosibirsk"){ echo "selected";} ?>>
  (GMT+06:00) Almaty, Novosibirsk</option>

<option timeZoneId="60" gmtAdjustment="GMT+06:00" useDaylightTime="0" value="6/Astana, Dhaka" <?php if($client_w_h["time_zone"] == "Astana, Dhaka"){ echo "selected";} ?>>
(GMT+06:00) Astana, Dhaka</option>

<option timeZoneId="61" gmtAdjustment="GMT+06:30" useDaylightTime="0" value="6.5/Yangon (Rangoon)" <?php if($client_w_h["time_zone"] == "Yangon (Rangoon)"){ echo "selected";} ?>>(GMT+06:30) Yangon (Rangoon)
</option>

<option timeZoneId="62" gmtAdjustment="GMT+07:00" useDaylightTime="0" value="7/Bangkok, Hanoi, Jakarta" <?php if($client_w_h["time_zone"] == "Bangkok, Hanoi, Jakarta"){ echo "selected";} ?>>
  (GMT+07:00) Bangkok, Hanoi, Jakarta
</option>

<option timeZoneId="63" gmtAdjustment="GMT+07:00" useDaylightTime="1" value="7/Krasnoyarsk" 
<?php if($client_w_h["time_zone"] == "Krasnoyarsk"){ echo "selected";} ?>>
(GMT+07:00) Krasnoyarsk</option>

<option timeZoneId="64" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8/Beijing, Chongqing, Hong Kong, Urumqi" <?php if($client_w_h["time_zone"] == "Beijing, Chongqing, Hong Kong, Urumqi"){ echo "selected";} ?>>(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi
</option>

<option timeZoneId="65" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8/Kuala Lumpur, Singapore" <?php if($client_w_h["time_zone"] == "Kuala Lumpur, Singapore"){ echo "selected";} ?>>(GMT+08:00) Kuala Lumpur, Singapore</option>

<option timeZoneId="66" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8/Irkutsk, Ulaan Bataar" <?php if($client_w_h["time_zone"] == "Irkutsk, Ulaan Bataar"){ echo "selected";} ?>>
(GMT+08:00) Irkutsk, Ulaan Bataar
</option>

<option timeZoneId="67" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8/Perth" 
<?php if($client_w_h["time_zone"] == "Perth"){ echo "selected";} ?>>
(GMT+08:00) Perth</option>

<option timeZoneId="68" gmtAdjustment="GMT+08:00" useDaylightTime="0" value="8/Taipei" 
<?php if($client_w_h["time_zone"] == "Taipei"){ echo "selected";} ?>>
(GMT+08:00) Taipei</option>

<option timeZoneId="69" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9/Osaka, Sapporo, Tokyo" <?php if($client_w_h["time_zone"] == "Osaka, Sapporo, Tokyo"){ echo "selected";} ?>>
  (GMT+09:00) Osaka, Sapporo, Tokyo</option>

<option timeZoneId="70" gmtAdjustment="GMT+09:00" useDaylightTime="0" value="9/Seoul" 
<?php if($client_w_h["time_zone"] == "Seoul"){ echo "selected";} ?>>
(GMT+09:00) Seoul</option>

<option timeZoneId="71" gmtAdjustment="GMT+09:00" useDaylightTime="1" value="9/Yakutsk" 
<?php if($client_w_h["time_zone"] == "Yakutsk"){ echo "selected";} ?>>
(GMT+09:00) Yakutsk</option>

<option timeZoneId="72" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5/Adelaide" 
<?php if($client_w_h["time_zone"] == "Adelaide"){ echo "selected";} ?>>
(GMT+09:30) Adelaide</option>

<option timeZoneId="73" gmtAdjustment="GMT+09:30" useDaylightTime="0" value="9.5/Darwin" 
<?php if($client_w_h["time_zone"] == "Darwin"){ echo "selected";} ?>>
(GMT+09:30) Darwin</option>

<option timeZoneId="74" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10/Brisbane" 
<?php if($client_w_h["time_zone"] == "Brisbane"){ echo "selected";} ?>>
(GMT+10:00) Brisbane</option>

<option timeZoneId="75" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10/Canberra, Melbourne, Sydney" <?php if($client_w_h["time_zone"] == "Canberra, Melbourne, Sydney")
{ echo "selected";} ?>>(GMT+10:00) Canberra, Melbourne, Sydney</option>

<option timeZoneId="76" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10/Hobart" 
 <?php if($client_w_h["time_zone"] == "Hobart"){ echo "selected";} ?>>
(GMT+10:00) Hobart</option>

<option timeZoneId="77" gmtAdjustment="GMT+10:00" useDaylightTime="0" value="10/Guam, Port Moresby" <?php if($client_w_h["time_zone"] == "Guam, Port Moresby")
{ echo "selected";} ?>>(GMT+10:00) Guam, Port Moresby</option>

<option timeZoneId="78" gmtAdjustment="GMT+10:00" useDaylightTime="1" value="10/Vladivostok" 
<?php if($client_w_h["time_zone"] == "Vladivostok"){ echo "selected";} ?>>
(GMT+10:00) Vladivostok</option>

<option timeZoneId="79" gmtAdjustment="GMT+11:00" useDaylightTime="1" value="11/Magadan, Solomon Is., New Caledonia" <?php if($client_w_h["time_zone"] == "Magadan, Solomon Is., New Caledonia"){ echo "selected";} ?>>
(GMT+11:00) Magadan, Solomon Is., New Caledonia
</option>

<option timeZoneId="80" gmtAdjustment="GMT+12:00" useDaylightTime="1" value="12/Auckland, Wellington" <?php if($client_w_h["time_zone"] == "Auckland, Wellington"){ echo "selected";} ?>>
  (GMT+12:00) Auckland, Wellington
</option>

<option timeZoneId="81" gmtAdjustment="GMT+12:00" useDaylightTime="0" value="12/Fiji, Kamchatka, Marshall Is" <?php if($client_w_h["time_zone"] == "Fiji, Kamchatka, Marshall Is"){ echo "selected";} ?>>
(GMT+12:00) Fiji, Kamchatka, Marshall Is.
</option>

<option timeZoneId="82" gmtAdjustment="GMT+13:00" useDaylightTime="0" value="13/Nuku'alofa" 
<?php if($client_w_h["time_zone"] == "Nuku'alofa"){ echo "selected";} ?>>
(GMT+13:00) Nuku'alofa
</option>
</select>
</div>
</p>



<hr />

<div class="radio">
  <label>Monday</label>
    <input id="mon_w_on" type="radio" name="mon_w" value="1" <?php if($client_w_h["day_0"] == "1" ) { echo "checked"; } ?>>
    <label for="on" class="radiobut" >On</label>
    <input id="mon_w_off" type="radio" name="mon_w" value="0" <?php if($client_w_h["day_0"] == "0" ) { echo "checked"; } ?>>

    <label for="off" class="radiobut">Off</label>


<div id="mon_select_time">
    
 <!---------------- from select -------------------->
 <label class="work_hours">From</label>
 
 <select id="mon_from_h" name="mon_from_ho" class="select small-input" title="From" readonly >
   <option value="" selected="">Hour</option>

<?php 

     $mon_from = explode(":", $client_w_h["day_0_start"]);

for($h=1;$h<=23; $h++){ 
          
       if($h< 10){ $h = "0".$h ; } 

    ?>
    
    <option value="<?php echo $h; ?>"  <?php if($h == $mon_from[0] ){ echo "selected"; } ?>  >
            <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>
   
 <select id="mon_from_m" name="mon_from_min" class="select small-input" title="From" readonly >
   <option value="" selected="">Minutes</option>
<?php      

  for($t=0;$t<=59;$t++){ 
    if($t< 10){ $t = "0".$t ;}
 
 ?>
    <option value="<?php echo $t; ?>" <?php if($t == $mon_from[1] ){
         echo "selected"; } ?> >
        <?php echo $t; ?></option>
<?php } ?>
  
</select>
    
    <!---------------- to select -------------------->
<label class="work_hours">To</label>    
<select id="mon_to_h" name="mon_to_ho" class="select small-input" title="To" readonly >
   <option value="" selected="">Hour</option>
<?php 
      $mon_to = explode(":", $client_w_h["day_0_end"]);
           

    for($h=1;$h<=23; $h++){ 
         if($h< 10){ $h = "0".$h ; }
 
        ?>
    <option value="<?php echo $h; ?>" <?php if($h == $mon_to[0] ){
            echo "selected"; } ?> >
            <?php echo $h; ?></option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="mon_to_m" name="mon_to_min" class="select small-input" title="To" readonly >
   <option value="" selected="">Minutes</option>
<?php       
      for($t=0;$t<=59;$t++){ 
 
      if($t< 10){ $t = "0".$t ;}
 ?>
    <option value="<?php echo $t; ?>" <?php if($t == $mon_to[1]){ echo "selected"; }  ?>>
      <?php echo $t; ?>
    </option>
<?php } ?>
  
</select>  
</div>
</div>

<?php /******************************************************************/  ?>
 
<div class="radio">
  <label>Tuesday</label>
    <input id="tues_w_on" type="radio" name="tues_w" value="1" <?php if($client_w_h["day_1"] == "1" ) { echo "checked"; } 

?>>
    <label for="on" class="radiobut" >On</label>
    <input id="tues_w_off" type="radio" name="tues_w" value="0" <?php if($client_w_h["day_1"] == "0" ) { echo "checked"; } 

?>>
    <label for="off" class="radiobut">Off</label>


<div id="tues_select_time"> 
  
 <!---------------- from select -------------------->


  <label class="work_hours">From</label>
 <select id="tues_from_h" name="tues_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 

   
        $tues_from = explode(":", $client_w_h["day_1_start"]);
        $tues_to   = explode(":", $client_w_h["day_1_end"]);


     for($h=1;$h<=23; $h++){ 
              if($h< 10){ $h = "0".$h ; }
    ?>
    <option value="<?php echo $h; ?>" <?php 
              if($h == $tues_from[0] ){ echo  "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="tues_from_m" name="tues_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       
    for($t=0;$t<=59;$t++){ 
      if($t< 10){ $t = "0".$t ; }
 ?>
   <option value="<?php echo $t; ?>" <?php 
              if($t == $tues_from[1] ){ echo  "selected"; } ?>>
    <?php echo $t; ?>
  </option>
<?php } ?>
   
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="tues_to_h" name="tues_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 

    for($h=1;$h<=23; $h++){
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>" <?php 
               if($h == $tues_to[0] ){ echo  "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="tues_to_m" name="tues_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       

  for($t=0;$t<=59;$t++){ 
  
     if($t< 10){ $t = "0".$t ;}

 ?>
   <option value="<?php echo $t; ?>" <?php 
               if($t == $tues_to[1] ){ echo  "selected"; } ?> >
    <?php echo $t; ?>
  </option>
<?php } ?>
   
</select>
</div>
</div>

<?php /**********************************************************/ ?>


<div class="radio">
<label>Wednesday</label>
    <input id="wed_w_on" type="radio" name="wed_w" value="1" <?php if($client_w_h["day_2"] == "1" ) { echo "checked"; } ?>>
    <label for="on" class="radiobut" >On</label>
    <input id="wed_w_off" type="radio" name="wed_w" value="0" <?php if($client_w_h["day_2"] == "0" ) { echo "checked"; } ?>>
    <label for="off" class="radiobut">Off</label>

  <div id="wed_select_time">

       <!---------------- from select -------------------->
  <label class="work_hours">From</label>
 <select id="wed_from_h" name="wed_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 

        $wed_from = explode(":", $client_w_h["day_2_start"]);
        $wed_to   = explode(":", $client_w_h["day_2_end"]);


for($h=1;$h<=23; $h++){
             if($h< 10){ $h = "0".$h ;}
    ?>
    <option value="<?php echo $h; ?>" <?php if ($h == $wed_from[0]){ echo "selected"; }?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="wed_from_m" name="wed_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if ($t == $wed_from[1]){ echo "selected"; }?> >
    <?php echo $t; ?>
  </option>
<?php } ?>
   
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="wed_to_h" name="wed_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 
      
    for($h=1;$h<=23; $h++){
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>"  <?php if ($h == $wed_to[0]){ echo "selected"; }?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="wed_to_m" name="wed_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if ($t == $wed_to[1]){ echo "selected"; }?>>
    <?php echo $t; ?>
  </option>
<?php } ?>
   
</select>
</div>
</div>

<?php /****************************************************/ ?>


<div class="radio">
  <label>Thursday</label>
    <input id="thur_w_on" type="radio" name="thur_w" value="1" <?php if($client_w_h["day_3"] == "1" ) { echo "checked"; } 

?>>
    <label for="on" class="radiobut" >On</label>
    <input id="thur_w_off" type="radio" name="thur_w" value="0" <?php if($client_w_h["day_3"] == "0" ) { echo "checked"; } 

?>>
    <label for="off" class="radiobut">Off</label>


  <div id="thur_select_time">

       <!---------------- from select -------------------->
  <label class="work_hours">From</label>
 <select id="thur_from_h" name="thur_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 

        $thur_from = explode(":", $client_w_h["day_3_start"]);
        $thur_to   = explode(":", $client_w_h["day_3_end"]);


for($h=1;$h<=23; $h++){ 
              if($h< 10){ $h = "0".$h ;}
    ?>
    <option value="<?php echo $h; ?>" <?php if($h == $thur_from[0]){ echo "selected";} ?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="thur_from_m" name="thur_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if($t == $thur_from[1]){ echo "selected";} ?>>
    <?php echo $t; ?>
   </option>
<?php } ?>
   
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="thur_to_h" name="thur_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 
      
    for($h=1;$h<=23; $h++){ 
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>"  <?php if($h == $thur_to[0]){ echo "selected";} ?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="thur_to_m" name="thur_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if($t == $thur_to[1]){ echo "selected";} ?>>
    <?php echo $t; ?>
   </option>
<?php } ?>
   
</select>
  </div>
  </div>

<?php /***********************************************************/?>

<div class="radio">
  <label>Friday</label>
    <input id="fri_w_on" type="radio" name="fri_w" value="1" <?php if($client_w_h["day_4"] == "1" ) { echo "checked"; } ?>>
    <label for="on" class="radiobut" >On</label>
    <input id="fri_w_off" type="radio" name="fri_w" value="0" <?php if($client_w_h["day_4"] == "0" ) { echo "checked"; } ?>>
    <label for="off" class="radiobut">Off</label>

  <div id="fri_select_time">

      
       <!---------------- from select -------------------->
  <label class="work_hours">From</label>
 <select id="fri_from_h" name="fri_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 
        $fri_from = explode(":", $client_w_h["day_4_start"]);
        $fri_to   = explode(":", $client_w_h["day_4_end"]);

      for($h=1;$h<=23; $h++){
             if($h< 10){ $h = "0".$h ;}
    ?>
    <option value="<?php echo $h; ?>" <?php if($h == $fri_from[0]){ echo "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="fri_from_m" name="fri_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if($t == $fri_from[1]){ echo "selected"; } ?>>
    <?php echo $t; ?>
  </option>
<?php } ?>
   
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="fri_to_h" name="fri_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 
      
    for($h=1;$h<=23; $h++){ 
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>" <?php if($h == $fri_to[0]){ echo "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="fri_to_m" name="fri_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
    <option value="<?php echo $t; ?>" <?php if($t == $fri_to[1]){ echo "selected"; } ?>>
      <?php echo $t; ?>
    </option>
<?php } ?>
  
</select>
</div>  
</div>


<?php /***********************************************************/ ?>

<div class="radio">
  <label>Saturday</label>
    <input id="satr_w_on" type="radio" name="satr_w" value="1" <?php if($client_w_h["day_5"] == "1" ) { echo "checked"; } ?>>
    <label for="on" class="radiobut" >On</label>
    <input id="satr_w_off" type="radio" name="satr_w" value="0" <?php if($client_w_h["day_5"] == "0" ) { echo "checked"; } ?>>
    <label for="off" class="radiobut">Off</label>


<div id="satr_select_time">

     <!---------------- from select -------------------->
  <label class="work_hours">From</label>
 <select id="satr_from_h" name="satr_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 

        $satr_from = explode(":", $client_w_h["day_5_start"]);
        $satr_to   = explode(":", $client_w_h["day_5_end"]);

for($h=1;$h<=23; $h++){ 
           if($h< 10){ $h = "0".$h ;}
    ?>
    <option value="<?php echo $h; ?>" <?php if( $h == $satr_from[0]){ echo "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="satr_from_m" name="satr_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
    <option value="<?php echo $t; ?>" <?php if( $t == $satr_from[1]){ echo "selected"; } ?>>
      <?php echo $t; ?>
    </option>
<?php } ?>
  
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="satr_to_h" name="satr_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 
      
    for($h=1;$h<=23; $h++){
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>" <?php if( $h == $satr_to[0]){ echo "selected"; } ?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="satr_to_m" name="satr_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
   <option value="<?php echo $t; ?>" <?php if( $t == $satr_to[1]){ echo "selected"; } ?>>
    <?php echo $t; ?>
   </option>
<?php } ?>
   
</select>   
</div>
</div>

<?php /*********************************************************/  ?>

<div class="radio">
  <label>Sunday</label>
    <input id="sun_w_on" type="radio" name="sun_w" value="1" <?php if($client_w_h["day_6"] == "1" ) { echo "checked"; } ?>>
    <label for="on" class="radiobut" >On</label>
    <input id="sun_w_off" type="radio" name="sun_w" value="0" <?php if($client_w_h["day_6"] == "0" ) { echo "checked"; } ?>>
    <label for="off" class="radiobut">Off</label>


<div id="sun_select_time">

     <!---------------- from select -------------------->
  <label class="work_hours">From</label>
 <select id="sun_from_h" name="sun_from_ho" class="select small-input" title="From" readonly>
   <option value="" selected="">Hour</option>

<?php 
       
        $sun_from = explode(":", $client_w_h["day_6_start"]);
        $sun_to   = explode(":", $client_w_h["day_6_end"]);

    for($h=1;$h<=23; $h++){
            if($h< 10){ $h = "0".$h ;}
    ?>
    <option value="<?php echo $h; ?>" <?php if($h == $sun_from[0]){ echo "selected";} ?>>
      <?php echo $h; ?>
    </option>
      
<?php  } ?>
   <option value="00">00</option>
</select>

 <select id="sun_from_m" name="sun_from_min" class="select small-input" title="From" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
    <option value="<?php echo $t; ?>" <?php if($t == $sun_from[1]){ echo "selected";} ?>>
      <?php echo $t; ?>
    </option>
<?php } ?>
  
</select>
    
    <!---------------- to select -------------------->
     <label class="work_hours">To</label>
<select id="sun_to_h" name="sun_to_ho" class="select small-input" title="To" readonly>
   <option value="" selected="">Hour</option>
<?php 
      
    for($h=1;$h<=23; $h++){ 
               if($h< 10){ $h = "0".$h ;}
        ?>
    <option value="<?php echo $h; ?>" <?php if($h == $sun_to[0]){ echo "selected";} ?>>
      <?php echo $h; ?>
    </option>
      
<?php  }  ?>
       <option value="00">00</option>

</select>
    
 <select id="sun_to_m" name="sun_to_min" class="select small-input" title="To" readonly>
   <option value="" selected="">Minutes</option>
<?php       for($t=0;$t<=59;$t++){ 
  
if($t< 10){ $t = "0".$t ;}
 ?>
    <option value="<?php echo $t; ?>" <?php if($t == $sun_to[1]){ echo "selected";} ?>>
      <?php echo $t; ?>
    </option>
   
<?php } ?>
  
</select>
</div>   
</div>

<?php /********************************************************/ ?>





<hr />

<p>
  <?php if ($client_w_h){ $nam = "update_wh"; $valu = "Update";}
  else{$nam = "add_wh"; $valu = "Save";} 
    ?>
    <input class="button" type="submit" name="<?php echo $nam; ?>" value="<?php echo $valu; ?>" 
    /> <input class="button" type="reset" value="Reset" />
</p>

</fieldset>

</form>

</div>
</div>
</div>
	
	<script src="js/jquery.validate.js"></script>
    <script>
	

	$().ready(function() {
		// validate the comment form when it is submitted
		$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
			
				mon_from_ho: {required: "#mon_w_on:checked"},
                                mon_from_min: {required: "#mon_w_on:checked"},
                                mon_to_ho: {required: "#mon_w_on:checked"},
                                mon_to_min: {required: "#mon_w_on:checked"},
                                tues_from_ho: {required: "#tues_w_on:checked"},
                                tues_from_min: {required: "#tues_w_on:checked"},
                                tues_to_ho: {required: "#tues_w_on:checked"},
                                tues_to_min: {required: "#tues_w_on:checked"},
                                wed_from_ho: {required: "#wed_w_on:checked"},
                                wed_from_min: {required: "#wed_w_on:checked"},
                                wed_to_ho: {required: "#wed_w_on:checked"},
                                wed_to_min: {required: "#wed_w_on:checked"},
                                thur_from_ho: {required: "#thur_w_on:checked"},
                                thur_from_min: {required: "#thur_w_on:checked"},
                                thur_to_ho: {required: "#thur_w_on:checked"},
                                thur_to_min: {required: "#thur_w_on:checked"},
                                fri_from_ho: {required: "#fri_w_on:checked"},
                               fri_from_min: {required: "#fri_w_on:checked"},
                                fri_to_ho: {required: "#fri_w_on:checked"},
                               fri_to_min: {required: "#fri_w_on:checked"},
                               satr_from_ho: {required: "#satr_w_on:checked"},
                                satr_from_min: {required: "#satr_w_on:checked"},
                               satr_to_ho: {required: "#satr_w_on:checked"},
                                satr_to_min: {required: "#satr_w_on:checked"},
                                sun_from_ho: {required: "#sun_w_on:checked"},
                                sun_from_min: {required: "#sun_w_on:checked"},
                               sun_to_ho: {required: "#sun_w_on:checked"},
                                sun_to_min: {required: "#sun_w_on:checked"} 
      	
			},
			messages: {
			
				
			}
		});



	
		
	});
	</script>

<!-- Body End -->

</div>

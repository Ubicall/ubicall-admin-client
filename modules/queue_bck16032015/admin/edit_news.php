 <script language="javascript" type="text/javascript" src="../js/gen_validatorv31.js"></script>
<?php
$id=$_GET['id'];
//error_reporting(0);
//error_reporting(E_ALL);
include('../classes/db_connector.php'); 
$db= new db_connector();
$conn= $db->connect();
include('../modules/news/class/news_manager.php');
$news_manager=new news_manager;
$news_manager->conn=$conn;
$news=$news_manager->select_news_by_id($id);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg"))
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    
    if (file_exists("../news_images/" . $_FILES["file"]["name"]))
      {
       move_uploaded_file($_FILES["file"]["tmp_name"],
      "../news_images/" .time()."_". $_FILES["file"]["name"]);
     $img=time()."_".$_FILES["file"]["name"];
     echo $img;
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../news_images/" .time()."_". $_FILES["file"]["name"]);
     $img=time()."_".$_FILES["file"]["name"];
     echo $img; 
     
      }
    }
 
  if($_POST['submit'])
 { 
	 
	 $title=trim($_POST['title']);
	 $brief=trim($_POST['brief']);
         $desc=trim($_POST['description']);
         $title_ar=trim($_POST['title_ar']);
	 $brief_ar=trim($_POST['brief_ar']);
         $desc_ar=trim($_POST['description_ar']);
         
	 $news_manager->edit_news($id,$title,$brief,$desc,$img,$title_ar,$brief_ar,$desc_ar);
	 echo" <script>
			window.location.href = 'index.php?pg=news&edit=true';
		</script>";
 }
 
  // if no image else{ .....} 
 
  }
 elseif($_POST['submit'])
 {
         $title=trim($_POST['title']);
	 $brief=trim($_POST['brief']);
         $desc=trim($_POST['description']);
         $title_ar=trim($_POST['title_ar']);
	 $brief_ar=trim($_POST['brief_ar']);
         $desc_ar=trim($_POST['description_ar']);
         $news_manager->edit_news_noimage($id,$title,$brief,$desc,$title_ar,$brief_ar,$desc_ar);
         echo" <script>
			window.location.href = 'index.php?pg=news&edit=true';
		</script>";
     
 }
  
  foreach ($news as $n)
  {

?>
<td width="680" align="left" valign="top">
    <form name="newsform"  action="index.php?pg=news&action=edit&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" >
    <br>
    <table style="width: 100%;">
        <tr>
            <td style="width: 30%;">Title:</td><td><input name="title" type="text" style="width: 340px;" value="<?php echo $n['title']; ?>"  ></td>
        </tr>
        <tr>
            <td style="width: 30%;">Arabic Title:</td><td><input name="title_ar" type="text" style="width: 340px;" value="<?php echo $n['title_ar']; ?>"  ></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Image:</td><td><input type="file" name="file" id="file"   value="" \><?php echo $n['image']; ?></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Brief:</td><td><textarea name="brief" rows="6" cols="40"><?php echo $n['brief']; ?></textarea></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Arabic Brief:</td><td><textarea name="brief_ar" rows="6" cols="40"><?php echo $n['brief_ar']; ?></textarea></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Description:</td><td><textarea name="description" rows="10" cols="40"><?php echo $n['description']; ?></textarea></td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Arabic Description:</td><td><textarea name="description_ar" rows="10" cols="40"><?php echo $n['description_ar']; ?></textarea></td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" name="submit" value="Submit" style="width: 100px; height: 40px;">
            </td>
               
        </tr>
        
    </table>
    <br>
    
</form>
</td>


<script language="JavaScript" type="text/javascript">

var frmvalidator  = new Validator("newsform");
frmvalidator.addValidation("title","req","Enter  News Title");
frmvalidator.addValidation("description","req","Enter  description");

frmvalidator.addValidation("brief","req","Enter  News Brief");

</script>

<?php 

}
?>
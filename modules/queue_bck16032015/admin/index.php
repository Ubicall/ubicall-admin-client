<?php

//error_reporting(0);
//error_reporting(E_ALL);
include('../classes/db_connector.php'); 
$db= new db_connector();
$conn= $db->connect();
include('../modules/news/class/news_manager.php');
$news_manager=new news_manager;
$news_manager->conn=$conn;
$news=$news_manager->select_news();

?>
  <script src="../js/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="../js/smartpaginator.js" type="text/javascript"></script>
    <link href="css/smartpaginator.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        $(document).ready(function () {
          
        $('#green').smartpaginator({ totalrecords: <?php echo count($news); ?>, recordsperpage: 10, datacontainer: 'mt', dataelement: 'tr', initval: 0, next: 'Next', prev: 'Prev', first: 'First', last: 'Last', theme: 'green' });

           
          

        });
    </script>
    <style type="text/css">
        body
        {
            padding: 20px;
        }
        #wrapper
        {
            margin: auto;
            width: 800px;
        }
        .contents
        {
            width: 100%; /*height: 150px;*/
            margin: 0;
        }
        .contents > p
        {
            padding: 8px;
        }
        .table
        {
            width: 100%;
            border-right: solid 1px #0073b1;
        }
        .table th, .table td
        {
            width: 16%;
            height: 20px;
            padding: 4px;
            text-align: left;
        }
        .table th
        {
            border-left: solid 1px #0073b1;
        }
        .table td
        {
            border-left: solid 1px #0073b1;
            border-bottom: solid 1px #0073b1;
        }
        .header
        {
            background-color: #0073b1;
            color: White;
        }
        #divs
        {
            margin: 0;
            height: 200px;
            font: verdana;
            font-size: 14px;
            background-color: White;
        }
        #divs > div
        {
            width: 98%;
            padding: 8px;
        }
        #divs > div p
        {
            width: 95%;
            padding: 8px;
        }
        ul.tab
        {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        ul.tab li
        {
            display: inline;
            padding: 10px;
            color: White;
            cursor: pointer;
        }
        #container
        {
            width: 100%;
            border: solid 1px red;
        }
    </style>

<td width="680" align="left" valign="top">
<!-- #BeginEditable "EditRegion3" -->
	
 <div id="green-contents" class="contents" style="border: solid 1px #0073b1;">
         
           
            <table id="mt" cellpadding="0" cellspacing="0" border="0" class="table">
                <tr class="header">
                    <th style="width: 50%;">
                        Title
                    </th>
                    <th style="width: 20%;">
                        Date
                    </th>
                    <th style="width: 10%;">
                        Update
                    </th>
                    <th style="width: 10%;">
                        Delete
                    </th>
                </tr>
<?php
            foreach ($news as $n)
            {
?>
                <tr>
                    <td>
                        <?php echo $n['title']; ?>
                    </td>
                    <td>
                        <?php echo $n['date']; ?>
                    </td>
                    <td>
                        <a href="index.php?pg=news&action=edit&id=<?php echo $n['id']; ?>" style="direction: none;"> <img src="images/icons/edit.png" width="16" height="16" alt="Update"></a>
                    </td>
                    <td>
                        <a href="index.php?pg=news&action=delete&id=<?php echo $n['id']; ?>" style="direction: none;" onclick="javascript: if(confirm('Are you sure you want to delete <?php echo $n['title'];  ?> ?'))
	return true;
else
	return false;
"> <img src="images/icons/no-show.png" width="16" height="16" alt="Show"></a>
                    </td>
                    
                </tr>
<?php
            }
?>
            </table></div>
<div id="green" style="margin: auto;" class="pager green"></div>
<br>
                <!-- #EndEditable -->
</td>

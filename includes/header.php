<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Ubicall | Dashboard</title>

<link rel="shortcut icon" type="img/x-icon" href="img/favicon.ico" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/jquery.multiselect.css" />
<link rel="stylesheet" href="css/jquery-ui.css" />

<link rel="stylesheet" href="css/jquery.dataTables.css" />

<script src="js/jquery.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script class="init">
$(document).ready(function() {
	$('#example').dataTable();
} );
</script>

<script src="js/jquery-ui.min.js"></script>
<script src="js/simpla.jquery.configuration.js"></script>
<script src="js/custom.js"></script>
<script src="js/smartpaginator.js"></script>
<script src="js/jquery.multiselect.js"></script>
    <style>
        .myLabel {
    border-radius: 4px;
    padding: 6px 10px;
    margin: 2px;
    background: #039a98;
    display: inline-block;
    border: none;
}
}
.myLabel:hover {
    background: #faa632;
}
.myLabel:active {
    background: #faa632;
}
.myLabel :invalid + span {
    color: #ffffff;
}
.myLabel :valid + span {
    color: #ffffff;
}
label.myLabel input[type="file"] {
    position: fixed;
    top: -1000px;
}
        </style>
</head>

<body onLoad="goforit()">

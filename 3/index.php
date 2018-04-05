<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
//Tell the browser to redirect to the HTTPS URL.    
header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);    
//Prevent the rest of the script from executing.    
exit;
}
$qstr = $_SERVER["QUERY_STRING"];
$qhstr = hash('sha256', $qstr);
$q2hstr = hash('sha256', $qhstr);
$q3hstr = hash('sha256', $qhstr);
?>
<html>
<head>
<title>
hash <?=$qstr?>
</title>
</head>
<body>
<?=$qstr.' hash to '.$qhstr.' <br>and 2x to '.$q2hstr.' <br>and 3x to'.$q3hstr?>
</body>
</html>

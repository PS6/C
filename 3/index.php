<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
//Tell the browser to redirect to the HTTPS URL.    
header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);    
//Prevent the rest of the script from executing.    
exit;
}
$qstr = $_SERVER["QUERY_STRING"];
if (empty($qstr)) {
    $ddir = "1";
} else {
    $ddir = "data/";
    $dirs = str_split($qstr);
    foreach($dirs as $part)
        $ddir .= "$part/";
}
?>
<html>
<head>
<title>redirect to <?=$ddir?>
</title>
</head>
<body>
<noscript>
<META http-equiv="refresh" content="0;URL=http://p.s-6.nl/<?=$ddir?>">
</noscript>
<a href="http://p.s-6.nl/<?=$ddir?>"></a>
<script>document.getElementsByTagName("a")[0].click();</script>
</body>
</html>

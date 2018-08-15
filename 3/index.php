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
$q3hstr = hash('sha256', $q2hstr);
$secret = hex2bin("$q3hstr");
$sig = hash_hmac('sha256', $q3hstr, $secret)
?>
<html>
<head>
<link rel="stylesheet" href="//cdn.jsdelivr.net/font-hack/2.020/css/hack.min.css">
<style>
body {
  margin: 0;
  padding: 0;  
  font-family: Hack,monospace;
  font-size: 24px;
  margin-left: 20%;
  margin-right: 20%;
}
</style>
<title>
hash <?=$qstr?>
</title>
</head>
<body>
<?= '<br>'.$qstr.' hash to : '.$qhstr.\
    ' <br>and 2x to : '.$q2hstr.\
    ' <br>and 3x to : '.$q3hstr.\
    ' <br>and sig is : '.$sig.\
    ' <br>and secret is : '.$secret.\
  '<br>' ?>
</body>
</html>

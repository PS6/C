<?php
date_default_timezone_set("UTC");
$useragent = $_SERVER['HTTP_USER_AGENT'];
$Token = $_GET['token'];
$Version = $_GET['version'];
$Loop = $_GET['loop'];
$Hex1 = $_GET['hex1'];
$Hex2 = $_GET['hex2'];
$Code = $_GET['code'];
$Version += 1;
$sigToken = hash_hmac('sha256', $Token, "B7&1(y^%mm0a12g&!09-g6yh4d");

$snow = time();
$cnow = (int)($output['time']/1000);
$titlestr = "<title>". date("H:i:s e",$snow) ." - " . $_SERVER['SERVER_NAME'] . " - " . $_SERVER['REQUEST_URI'] . "</title>";

?>

<!DOCTYPE html>
<html>
<head>
<? echo $titlestr ?>
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
</head>
<body>
<? echo 'qstr : ' . $qstr ?> <br>
<? echo 'raw qstr : ' . $rawqstr ?> <br>
<? echo 'Datetime : ' . date("H:i:s e",$snow) ?> <br>
<? echo 'Token    : ' . $Token ?> <br>
<? echo "sigToken : " . $sigToken ?> <br>
<? echo "Code     : " . $Code ?> <br>
<? echo "Loop     : " . $Loop ?> <br>
<? echo "Hex1     : " . $Hex1 ?> <br>
<? echo "Hex2     : " . $Hex2 ?> <br>
<? echo "Version  : " . $Version ?> <br>
<? echo "UserAgent: " . $useragent ?> <br>
<script>
var qstr = window.location.hash.substring(1);
var redstr = "../?" + <? echo $Version ?> + "#" + qstr;
//setTimeout(function(){alert(redstr)}, 10000);
document.writeln('<br><a href=' + redstr + '>direct redirect</a>');
setTimeout(function(){location.assign(redstr)}, 590000);
</script>
</div>
</body>
</html>

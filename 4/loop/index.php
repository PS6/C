<?php
date_default_timezone_set("UTC");
$qstr = $_SERVER["QUERY_STRING"];
parse_str($qstr, $output);
$Token = $output['token'];
$Version = $output['version'];
$Loop = $output['loop'];
$Code = $output['code'];
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
</head>
<body>
<? echo "Token    : " . $Token ?> <br>
<? echo "sigToken : " . $sigToken ?> <br>
<? echo "Code     : " . $Code ?> <br>
<? echo "Version  : " . $Version ?> <br>
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

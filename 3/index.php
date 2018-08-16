<?php
if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on")
{
//Tell the browser to redirect to the HTTPS URL.    
header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);    
//Prevent the rest of the script from executing.    
exit;
}
  
function hash256($data)
{
    return hash('sha256', hex2bin(hash('sha256', $data)));
}

function hash160($data)
{
    return hash('ripemd160', hex2bin(hash('sha256', $data)));
} 

$qstr = $_SERVER["QUERY_STRING"];
$qhstr = hash('sha256', $qstr);
$q2hstr = hash256($qstr);
$q3hstr = hash256(hex2bin($qhstr));
$q4hstr = hash('sha256',hex2bin($qhstr));
$q5hstr = hash('sha256',hex2bin($q3str));
$secret = hex2bin($q3hstr);
$secretstr = base64_encode($secret);
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
<?= '<br>'.$qstr.
    ' <br>hash to    : '.$qhstr.
    ' <br>and 2 to   : '.$q2hstr.
    ' <br>and 3 to   : '.$q3hstr.
    ' <br>and 4 to   : '.$q4hstr.
    ' <br>and 5 to   : '.$q5hstr.
    ' <br>and sig is : '.$sig.
    ' <br>and secret : '.$secretstr.
  '<br>' ?>
</body>
</html>

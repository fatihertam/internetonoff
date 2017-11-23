<html>
<head>
<script type="text/javascript">
function show_alert()
{
alert("F.Ü Enformatik Bölümü ENF-1 Laboratuvarı \nÖğrenci bilgisayarlarının internet bağlantısı PASİF edilmiştir. \n\nProblem halinde bildiriniz (fatih.ertam@firat.edu.tr)");
window.close()
}
</script>
<style type="text/css">
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 36px;
	color: #FFF;
}
body {
	background-color: #000;

}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9">
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="show_alert()">
<?php
$filename = "ip.txt"; // ip.txt log
$fp = fopen ($filename, "a");
$browser = $_SERVER['HTTP_USER_AGENT'];
$theirip = $_SERVER['REMOTE_ADDR'];
$fline = date('m.d.y \a\t h:ia');
if (!isset($_SERVER['HTTP_REFERER']))
{
$wherefrom = "No Valid Referer";
}
else
{
$wherefrom = $_SERVER['HTTP_REFERER'];
}
fwrite($fp, "" . $fline . " | " . $theirip .  " KAPATILDI\n");
fclose($fp);
// working ip is client computer ip
if ($theirip == 'working_ip') {
require_once "PHPTelnet.php";

$telnet = new PHPTelnet();


// PHPTelnet connection switch ip example: 10.2.1.1
$result = $telnet->Connect('switch-ip','username','password');

// switch port enable command ex: set port disable ge.1.1-48
if ($result == 0) {
$telnet->DoCommand('set port disable ge.1.1-48', $result);

$telnet->Disconnect();
}}
else { print "gerekli kayıtlar alındı, sizinle uğraşılacaktır" ;} // different client ip messsage
?> 
<img src="internet.jpg" width="100%" height="100%" align="top">

</body>
</html>
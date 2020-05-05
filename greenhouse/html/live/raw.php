<?php 
require("php_serial.class.php"); 
if (isset($_GET['action'])) 
{ 
$serial = new phpSerial;
$serial->deviceSet("/dev/ttyACM0");
$serial->confBaudRate(115200);
$serial->deviceOpen();
    if ($_GET['action'] == "greenon") 
	{ 
	$serial->sendMessage("0"); 
		
	}	 
	else if ($_GET['action'] == "greenoff") 
	{ 
    $serial->sendMessage("1\r"); 
    }
	else if ($_GET['action'] == "redon") 
	{ 
    $serial->sendMessage("2\r"); 
	$read = $serial->readPort();
	echo $read;
	} 
	else if ($_GET['action'] == "redoff") 
	{ 
    $serial->sendMessage("3\r"); 
    }
 $serial->sendMessage("S\r"); 
$done = false;
        $line = "";
                while (!$done) 
                {
                $read = $serial->readPort();
                echo $read;        
		for ($i = 0; $i < strlen($read); $i++) 
                        {
                                if ($read[$i] == "\n") 
                                {
                                $done = true;
                                echo "Response from Arduino: ".$line."\n";
                                $line = "";
                                } 
                                else 
                                {
                                $line .= $read[$i];
                                }
                        }
                }


$serial->deviceClose(); 
} 


?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Arduino Project 1: Serial LED Control</title> 
</head> 
<body> 

<h1>Arduino Project 1: Serial LED Control</h1> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenon" ?>">
Click here to turn pin13 on.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenoff" ?>">
Click here to turn pin13 off.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redon" ?>">
Click here to turn the RED LED on.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redoff" ?>">
Click here to turn the RED LED off.</a></p> 
</body> 
</html>



 <?php 
require("php_serial.class.php"); 
if (isset($_GET['action'])) 
{ 
	$serial = new phpSerial;
	$serial->deviceSet("/dev/ttyACM0");
	$serial->confBaudRate(9600);
	$serial->deviceOpen();
    	if ($_GET['action'] == "greenon") 
		{ 
		$serial->sendMessage("0\r"); 
		 

		$done = false;
		
	}	 
	else if ($_GET['action'] == "greenoff") 
		{ 
    		$serial->sendMessage("1\r");
		$done = false;
              
    	}
	else if ($_GET['action'] == "redon") 
		{ 
    		$serial->sendMessage("2\r");
		$done = false;
        } 
	else if ($_GET['action'] == "redoff") 
		{ 
    		$serial->sendMessage("3\r");
		$done = false;
        }      
    
	else if ($_GET['action'] == "wateron") 
        	{ 
    		$serial->sendMessage("4\r"); 
        	$done = false;
             
        } 
        else if ($_GET['action'] == "wateroff") 
        { 
    		$serial->sendMessage("5\r");
		$done = false;
        }

	$line = "";
                while (!$done) 
                {
                $read = $serial->readPort();
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
	?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
"http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Arduino Project 1: Serial LED Control</title> 
</head> 
<body> 

<h1>Arduino Project 1: Serial LED Control</h1> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenon" ?>">
Click here to turn LED OFF.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=greenoff" ?>">
Click here to turn LED ON.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redon" ?>">
Click here to turn the FAN OFF.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=redoff" ?>">
Click here to turn the FAN ON.</a></p>
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=wateroff" ?>">
Click here to turn the  WaterPump OFF.</a></p> 
<p><a href="<?=$_SERVER['PHP_SELF'] . "?action=wateron" ?>">
Click here to turn the  WaterPump ON.</a></p>  
</body> 
</html>




 <?php 
require("php_serial.class.php"); 
if (isset($_GET['action'])) 
{ 
	$serial = new phpSerial;
	$serial->deviceSet("/dev/ttyACM0");
	$serial->confBaudRate(9600);
	$serial->deviceOpen();
    	$serial->sendMessage("LedLightON\r");
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




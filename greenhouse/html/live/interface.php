 <?php 
	require("php_serial.class.php"); 
        

	$line = "";
	$done=false;
 
	$serial = new phpSerial;
	//$port = $_GET['port'];
	echo(exec("ls /dev/ttyAMA0"));
	$port = '/dev/ttyACM0';
	//echo $port;
	$serial->deviceSet($port);
	$serial->confBaudRate(9600);
	$serial->deviceOpen();
    	$serial->sendMessage('S\r'); 
	//$serial->sendMessage('\r'); 
        
        
                while (!$done){
                
		
                $read = $serial->readPort();
        	echo $read;        
	        for ($i = 0; $i < strlen($read); $i++) 
                        {
                                if ($read[$i] == "\n") 
                                {
                                $done = true;
                                echo $line;
                                $line = "";
				
                                } 
                                else 
                                {
                                $line .= $read[$i];
                                }
                        }
                }
             
    	
	echo $line;
	
	//$serial->deviceClose(); 


	
	?>


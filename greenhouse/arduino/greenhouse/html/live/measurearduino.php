<?php
	require_once "funs.php" ;
        $output = exec("php /var/www/html/live/interface.php")
	echo json_decode($output);
	//print_r($yummy);

       //Stats::measureArduino();
       
?>

<!DOCTYPE html>
<html>
<head>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body.>


<select name="per1" id="per1">
  <option selected="selected">Choose one</option>
	<?php

		$row = exec('ls /dev/ttyA* ',$output,$error);
		while(list(,$row) = each($output)){
			echo "$output","<BR>\n";
			echo "<option value='".$output."'>".$output."</option>";
			}

		if($error){
			echo "Error : $error<BR>\n";
		exit;
			}




	?>

</select> 
<h2>Toggle Switch</h2>

<label class="switch">
  <input type="checkbox">
  <div class="slider"></div>
</label>

<label class="switch">
  <input type="checkbox" checked>
  <div class="slider"></div>
</label><br><br>

<label class="switch">
  <input type="checkbox">
  <div class="slider round"></div>
</label>

<label class="switch">
  <input type="checkbox" checked>
  <div class="slider round"></div>
</label>

</body>
</html> 
<button type="button" id="btnPlay">Play</button>

<script>
$("#btnPlay").click(function(){

    var button = $(this) ;

    if (!button.hasClass('pressed')) {
        //button is unpressed
        $.post("ajax.php", { userId: "5512", action: "play" },
            function(data){
               button.addClass('pressed');
               button.html("Playing!") ;
            }
        );
    }
    else {
        //button is pressed, toggle it back
        $.post("ajax.php", { userId: "5512", action: "stopPlaying" },
            function(data){
               button.removeClass('pressed');
               button.html("Play") ;
            }
        );
    }



});

</script>
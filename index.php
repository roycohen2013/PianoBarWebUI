<html>
	<head>
		<script src="jquery-1.8.0.js" type="text/javascript"></script>
		
		<script src="scripts.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="style.css" type="text/css" />		
	
	</head>
	
	<body>
	
	
	<div id="wrapper">
	
	<?php
		echo "starting";
		
		$txt_file    = file_get_contents('/Applications/XAMPP/xamppfiles/htdocs/runtime.txt');
		$rows        = explode("\n", $txt_file);
		$stationList = array();
		
		
		
		while(strpos($rows[0],"Get stations") == false){
			array_shift($rows);
		
		}
		array_shift($rows);
		
		
		$index = 0;
		while(strpos($rows[$index],"Select station") == false){
			echo "$index";
			$index++;
		}
		
		$index--;
		
		echo '<div id="stationList">'; //start the station list
		
		for($i = 0; $i <= $index; $i++){
			
			$rows[$i] = str_replace("[2K","",$rows[$i]);
			
			$rows[$i] = str_replace_first("q","",$rows[$i]);
			
			
			$stationList[$i] = $rows[$i];
			
			
			$id = "station".$i;
			echo '<div id='.$id.' class="station" sta='.$i.' > <div> '; 
			//echo $i;
			//echo '<a href="stationcontrol.php?name='.$i.'" > ';
			echo "$rows[$i]";
			//echo '</a>';
			echo '</div> </div> <!-- station end -->';
		}
		
		echo '</div> <!-- end stationlist -->'; //close the station list
		
		function str_replace_first($search, $replace, $subject) {
		    $pos = stripos($subject, $search);
		    if ($pos !== false) {
		        $subject = substr_replace($subject, $replace, $pos, strlen($search));
		        
		    }
		    return $subject;
		}
		
		
		echo '<script src="" type="text/javascript">init();</script>';
		
	//	foreach($rows as $row => $data)
	//	{
		    //get row data
	//	    $row_data = explode('^', $data);
	//	
	//	    $info[$row]['id']           = $row_data[0];
	//	    $info[$row]['name']         = $row_data[1];
	//	    $info[$row]['description']  = $row_data[2];
	//	    $info[$row]['images']       = $row_data[3];
	//	
		    //display data
	//	    echo 'Row ' . $row . ' ID: ' . $info[$row]['id'] . '<br />';
	//	    echo 'Row ' . $row . ' NAME: ' . $info[$row]['name'] . '<br />';
	//	    echo 'Row ' . $row . ' DESCRIPTION: ' . $info[$row]['description'] . '<br />';
	//	    echo 'Row ' . $row . ' IMAGES:<br />';
	//	
		    //display images
	//	    $row_images = explode(',', $info[$row]['images']);
	//	
	//	    foreach($row_images as $row_image)
	//	    {
	//	        echo ' - ' . $row_image . '<br />';
	//	    }
	//	
	//	    echo '<br />';
	//	}
	
	
	?>	
	
		<div id="controlPanel">
			<div id="banSong" 			class="pnlButton">Ban</div>
			<div id="toggleMusic" 		class="pnlButton">Play/Pause</div>
			<div id="loveSong" 			class="pnlButton">Love</div>
			<div id="decreaseVolume"	class="pnlButton">Dec. Vol</div>
			<div id="nextSong" 			class="pnlButton">Next</div>
			<div id="increaseVolume" 	class="pnlButton">Inc. Vol</div>
		</div>
	
	</div> <!-- end wrapper   -->
	
	
	</body>
</html>


	
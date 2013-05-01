<?php

	echo "RUNNING";

	//$email=$_POST['email'];
	//$password=$_POST['password'];
	//$_COOKIE["sessionCookie"];
	
	//$output = system('cd ~/');
	//echo "<pre>$output</pre>";
	
	//shell_exec('sudo -u root -S ls < ihatems1234');
	

//
	//runExternal("pianobar > runtime.txt",$code);
//	
//	print "<pre>";
//	print $result;
//	print "</pre>\n";
//	
//	print "<b>code: $code</b>\n";

//shell_exec("su roycohen -c pianobar");
	
//	$result= runExternal("su roycohen -c pianobar",$code);
//	print "<pre>";
//	print $result;
//	print "</pre>\n";
//	
//	print "<b>code: $code</b>\n";
//	
	
	
	
	
	//$result= runExternal("echo 'roychook.com@gmail.com' > ~/.config/pianobar/ctl",$code);
	
	print "<pre>";
	print $result;
	print "</pre>\n";
	
	print "<b>code: $code</b>\n";

	//$result= runExternal("echo 'ihatems1234' > ~/.config/pianobar/ctl",$code);
	
	print "<pre>";
	print $result;
	print "</pre>\n";
	
	print "<b>code: $code</b>\n";
	
	
$result= runExternal("echo '5' > ~/.config/pianobar/ctl",$code);

print "<pre>";
print $result;
print "</pre>\n";

print "<b>code: $code</b>\n";



//	$output = system('pwd');
//	echo "<pre>$output</pre>";
	
	
	echo "<pre>1</pre>";
	//shell_exec('pianobar');
	echo "<pre>2</pre>";
			//echo -n 'n' > ~/.config/pianobar/ctl
	//shell_exec("echo 'roychook.com@gmail.com' > ~/.config/pianobar/ctl");
	echo "<pre>3</pre>";
	//shell_exec("echo 'ihatems1234' > ~/.config/pianobar/ctl");
	//echo "<pre>4</pre>";
	//shell_exec("echo '5' > ~/.config/pianobar/ctl");
	


	


	function runExternal($cmd,&$code) {
	    $descriptorspec = array(
	        0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
	        1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
	        2 => array("pipe", "w") // stderr is a file to write to
	    );
	    
	    $pipes= array();
	    $process = proc_open($cmd, $descriptorspec, $pipes);
	    
	    $output= "";
	    
	    if (!is_resource($process)) return false;
	    
	    #close child's input imidiately
	    fclose($pipes[0]);
	    
	    stream_set_blocking($pipes[1],false);
	    stream_set_blocking($pipes[2],false);
	    
	    $todo= array($pipes[1],$pipes[2]);
	    
	    while( true ) {
	        $read= array(); 
	        if( !feof($pipes[1]) ) $read[]= $pipes[1];
	        if( !feof($pipes[2]) ) $read[]= $pipes[2];
	        
	        if (!$read) break;
	        
	        $ready= stream_select($read, $write=NULL, $ex= NULL, 2);
	        
	        if ($ready === false) {
	            break; #should never happen - something died
	        }
	        
	        foreach ($read as $r) {
	            $s= fread($r,1024);
	            $output.= $s;
	        }
	    }
	    
	    fclose($pipes[1]);
	    fclose($pipes[2]);
	    
	    $code= proc_close($process);
	    
	    return $output;
	}
	
	

?>
<?php

$Name = $_POST['name'];
$first = $_POST['first'];

if (isset($first)){
	$result= runExternal("echo  '$Name' > ~/.config/pianobar/ctl",$code);
}else{
	$result= runExternal("echo -n 's' > ~/.config/pianobar/ctl ;",$code);
	$result= runExternal("echo '$Name' > ~/.config/pianobar/ctl ",$code);
}



/*
if ($first === "s"){
	$result= runExternal("echo '$Name' > ~/.config/pianobar/ctl",$code);
}else{
	$result= runExternal("echo 's' > ~/.config/pianobar/ctl ;",$code);
	$result= runExternal("echo '$Name' > ~/.config/pianobar/ctl ",$code);
}

*/


print "<pre>";
print $result;
print "</pre>\n";

print "<b>code: $code</b>\n";










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
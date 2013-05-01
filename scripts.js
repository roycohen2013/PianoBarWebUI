var firstPick = true;
	
	function postfunction(data) {
		var first = null;
		if (firstPick === true){
			first = "s";
			firstPick = false;
			console.log("first pack");
		}
			
		$.post( "stationcontrol.php", { name: data, pick: first }, 
			function( data ) {
				console.log("...received!");
				return data;
			}
		);	
		console.log("sending:"+data);		
	}
	
	
	
	
	function generalPostFunction(script, data) {
						
		$.post( script, { name: data }, 
			function( data ) {
				console.log("...received! "+script);
				return data;
			}
		);	
		console.log("sending:"+script);		
	}
	
	

	function init() {
		console.log("narp");
	 	$(function(){
	 		
		    $(".station").click(function() {
		        postfunction($(this).attr("sta"));
		    });
		    
		    
		    $("#toggleMusic").click(function() {
		        generalPostFunction("toggleMusic.php", "");
		    });
		    
		    $("#banSong").click(function() {
		        generalPostFunction("banSong.php", "");
		    });
		    
		    
		    $("#nextSong").click(function() {
		        generalPostFunction("nextSong.php", "");
		    });
		    
		    
		    $("#loveSong").click(function() {
		        generalPostFunction("loveSong.php", "");
		    });
		    
		    
		    $("#decreaseVolume").click(function() {
		        generalPostFunction("decreaseVolume.php", "");
		    });
		    
		    $("#increaseVolume").click(function() {
		        generalPostFunction("increaseVolume.php", "");
		    });
		    
		});		
	}
	
	
init();
	
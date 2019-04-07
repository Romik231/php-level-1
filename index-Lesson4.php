<?php

	include ("header.php");
	
	function renderImg(){
	//$path2 = 'big/';
	$imgSmall = scandir('img/small/');

	//$path = glob('small/*.{jpg,png}', GLOB_BRACE);
		foreach($imgSmall as $nameImg){
			if($nameImg == "." ||$nameImg == ".."){
				continue;
			}else{
				echo "<a href='img/big/$nameImg' class='modal'><img src='img/small/$nameImg'/></a>";
			}
								
				
			}
		} 
	
	
			
	include ("footer.php");
?>
       
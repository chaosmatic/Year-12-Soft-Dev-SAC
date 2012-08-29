<?php
session_start();
require_once("head.php");
echo "<div id='UI'>";
//SANITIZATION
$storeStack1 = filter_var($_POST["storeStack1"], FILTER_SANITIZE_NUMBER_INT);
$storeStack2 = filter_var($_POST["storeStack2"], FILTER_SANITIZE_NUMBER_INT);

if(isset($_SESSION['warehouse']) & count($_SESSION['warehouse'])>0 ){
	if($storeStack1 and $storeStack2){
		if (filter_var($storeStack1,FILTER_VALIDATE_INT) && $storeStack1 > 0 && $storeStack1 <= $amountOfStores && filter_var($storeStack2,FILTER_VALIDATE_INT) && $storeStack2 > 0 && $storeStack2 <= $amountOfStores){
			//MOVE
			$storeStack1 = "store".$storeStack1;
			$storeStack2 = "store".$storeStack2;
			if($storeStack1==$storeStack2){ //FOR VALIDATION PURPOSES
				$same = 1;
			}else{
				$same = 0;
			}
			if(count($_SESSION[$storeStack1])<$maxStoreSize and count($_SESSION[$storeStack2])<$maxStoreSize-$same){
				$crate = array_pop($_SESSION['warehouse']);
				array_push($_SESSION[$storeStack1],$crate);
				array_push($_SESSION[$storeStack2],$crate);
			}else{
				echo "One or more of those stores are full!<br>";
			}
			require_once("UI.php");
		}else{
			echo "Please select a valid crate.<br>";
		}
	}else{
		//DISPLAY MOVE FORM
		echo "<form method='post' action='move.php'>";
		echo "<input type='submit' value='MOVE' name='submit'><br>";
		echo "<a href='index.php'>BACK</a>";
		$move = True;
	}
}else{
	echo "nothing to move<br>";
	require_once("UI.php");
}
echo "</div>";
require_once("display.php");		
require_once("foot.php");
?>
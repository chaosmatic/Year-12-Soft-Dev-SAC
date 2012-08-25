<?php
session_start();
require_once("head.php");
echo "<div id='UI'>";
//SANITIZATION
$StoreStack1 = filter_var($_POST["StoreStack1"], FILTER_SANITIZE_NUMBER_INT);
$StoreStack2 = filter_var($_POST["StoreStack2"], FILTER_SANITIZE_NUMBER_INT);

if(isset($_SESSION['warehouse']) & count($_SESSION['warehouse'])>0 ){
	if($StoreStack1 and $StoreStack2){
		if (filter_var($StoreStack1,FILTER_VALIDATE_INT) && $StoreStack1 > 0 && $StoreStack1 <= $amountOfStores && filter_var($StoreStack2,FILTER_VALIDATE_INT) && $StoreStack2 > 0 && $StoreStack2 <= $amountOfStores){
			//MOVE
			$StoreStack1 = "store".$StoreStack1;
			$StoreStack2 = "store".$StoreStack2;
			if($StoreStack1==$StoreStack2){
				$same = 1;
			}else{
				$same = 0;
			}
			if(count($_SESSION[$StoreStack1])<$maxStoreSize and count($_SESSION[$StoreStack2])<$maxStoreSize-$same){
				$crate = array_pop($_SESSION['warehouse']);
				array_push($_SESSION[$StoreStack1],$crate);
				array_push($_SESSION[$StoreStack2],$crate);
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
		echo "<input type='submit' value='MOVE CRATE' name='submit'><br>";
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
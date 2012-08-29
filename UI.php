<?php //DISPLAYS LINKS

$full = True;
for ($storeNumber=1; $storeNumber <= $amountOfStores; $storeNumber++) { 
	if (count($_SESSION['store'.$storeNumber])<10){
		$full = False;
	}	
}

if(count($_SESSION['warehouse'])>0 and !$full){
	echo "<a href='move.php'>Move from warehouse stack<br></a>";
}

if(count($_SESSION['warehouse'])<$maxWarehouseSize){
	echo "<a href='add.php'>Add to warehouse stack<br></a>";
}

if($full and count($_SESSION['warehouse'])>=$maxWarehouseSize){
	echo "Empty some of the Store Stacks.<br>";
}
echo "<br><a href='tips.php'>User Guide</a>";
?>
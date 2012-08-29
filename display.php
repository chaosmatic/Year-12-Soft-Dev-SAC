<?php //TAKES CARE OF ALL THE CRATES
if(!isset($_SESSION['warehouse'])){
	$_SESSION['warehouse'] = array();
 	for ($storeNumber=1; $storeNumber <= $amountOfStores; $storeNumber++) { 
  		$_SESSION['store'.$storeNumber] = array();
 	}
}	

//DISPLAY WAREHOUSE STACK
echo "<div id='warehouse'>";
echo "<table class='warehouseTable'>";
$warehouseStack = array_reverse($_SESSION['warehouse']);
foreach ($warehouseStack as $key => $value) {
	echo "<tr><td class='warehouseCell'>";
	echo $value;
	echo "</td></tr>";
}
echo "</table><b>Warehouse</b><br>";
echo  "Crates: ".count($_SESSION['warehouse'])."<br><br>";
echo "</div>";

//DISPLAY SHOP STACKS
for ($storeNumber=1; $storeNumber <= $amountOfStores; $storeNumber++) { 
	$storeName = "store".$storeNumber;
	echo "<div id='".$storeName."'>";
	$storeStack = array_reverse($_SESSION[$storeName]);
	
	echo "<table class='storeTable'>";
	if ($move){ //DISPLAY THE CHECK BOXES
		if(count($_SESSION['store'.$storeNumber])<($maxStoreSize -1)){ 
			echo "<tr><td id='addCrate2'>";
			echo "Add Crate 2: <input type='radio' value='".$storeNumber."' name='storeStack2'><br>";
			echo "</td></tr>";
		}
		if(count($_SESSION['store'.$storeNumber])<$maxStoreSize){ 
			echo "<tr><td id='addCrate1'>";
			echo "Add Crate 1: <input type='radio' value='".$storeNumber."' name='storeStack1'>";
			echo "</td></tr>"; 
		}
	}
	foreach ($storeStack as $key => $value) {
		echo "<tr><td class='storeCell'>";
		echo $value;
		echo "</td></tr>";
	}
	echo "</table>";
	echo "<b>Store " . $storeNumber . "</b><br>";
	echo  "Crates: ".count($_SESSION['store'.$storeNumber])."<br>";
	if (count($_SESSION['store'.$storeNumber])>0 and !$move){
		echo "<a href='ship.php?store=".$storeNumber."'>Ship</a><br>";
	}else{
		echo "<font color='#A0A0A0'>Ship</font><br>";
	}	
	echo "</div>";
}
echo "</div>";
?>

<?php
if(!isset($_SESSION['warehouse'])){
	$_SESSION['warehouse'] = array();
 	for ($StoreNumber=1; $StoreNumber <= $amountOfStores; $StoreNumber++) { 
  		$_SESSION['store'.$StoreNumber] = array();
 	}
}	

//DISPLAY WAREHOUSE STACK
echo "<div id='Warehouse'>";
echo "<table class='WarehouseTable'>";
$WarehouseStack = array_reverse($_SESSION['warehouse']);
foreach ($WarehouseStack as $key => $value) {
	echo "<tr><td class='WarehouseCell'>";
	echo $value;
	echo "</td></tr>";
}
echo "</table><b>Warehouse Stack</b><br>";
echo  "Crates: ".count($_SESSION['warehouse'])."<br>";
echo "</div>";

//DISPLAY SHOP STACKS
for ($StoreNumber=1; $StoreNumber <= $amountOfStores; $StoreNumber++) { 
	$Storename = "store".$StoreNumber;
	echo "<div id='".$Storename."'>";
	$StoreStack = array_reverse($_SESSION[$Storename]);
	
	echo "<table class='StoreTable'>";
	foreach ($StoreStack as $key => $value) {
		echo "<tr><td class='StoreCell'>";
		echo $value;
		echo "</td></tr>";
	}
	echo "</table>";
	echo "<b>Store " . $StoreNumber . " Stack</b><br>";
	echo  "Crates: ".count($_SESSION['store'.$StoreNumber])."<br>";
	if (count($_SESSION['store'.$StoreNumber])>0){
		echo "<a href='ship.php?store=".$StoreNumber."'>Ship This Stack</a><br>";
	}else{
		echo "<font color='#A0A0A0'>Ship</font><br>";
	}	
	echo "</div>";
}
echo "</div>";
?>

<?php
session_start();
require_once("head.php");
//STUFF AT THE TOP
echo "<div id='UI'>";
$StoreStack1 = filter_var($_POST["StoreStack1"], FILTER_SANITIZE_NUMBER_INT);
$StoreStack2 = filter_var($_POST["StoreStack2"], FILTER_SANITIZE_NUMBER_INT);

if(isset($_SESSION['warehouse']) & count($_SESSION['warehouse'])>0 ){
	if($StoreStack1 and $StoreStack2){
		if (filter_var($StoreStack1,FILTER_VALIDATE_INT) && $StoreStack1 > 0 && $StoreStack1 < 5 && filter_var($StoreStack2,FILTER_VALIDATE_INT) && $StoreStack2 > 0 && $StoreStack2 < 5){
			$crate = array_pop($_SESSION['warehouse']);
			$StoreStack1 = "store".$StoreStack1;
			$StoreStack2 = "store".$StoreStack2;
			array_push($_SESSION[$StoreStack1],$crate);
			array_push($_SESSION[$StoreStack2],$crate);
			require_once("UI.php");
		}else{
			echo "Please select a valid crate.<br>";
		}
		echo "</div>";
		require_once("display.php");
	}else{
		echo "<form method='post' action='move.php'>";
		echo "<input type='submit' value='MOVE CRATE' name='submit'><br>";
		echo "<a href='index.php'>BACK</a>";
		echo "</div>";
		//DISPLAY
		if(!isset($_SESSION['warehouse'])){
			$_SESSION['warehouse'] = array();
			$_SESSION['store1'] = array();
			$_SESSION['store2'] = array();
			$_SESSION['store3'] = array();
			$_SESSION['store4'] = array();
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
		echo  "Crates on stack: ".count($_SESSION['warehouse'])."<br><br>";
		echo "</div>";

		//DISPLAY SHOP STACKS
		
		for ($StoreNumber=1; $StoreNumber < 5; $StoreNumber++) { 
			$Storename = "store".$StoreNumber;
			echo "<div id='".$Storename."'>";
			echo "<table class='StoreTable'>";
			if(count($_SESSION['store'.$StoreNumber])<9){ 
				echo "<tr><td id='AddCrate2'>";
				echo "Add Crate 2: <input type='radio' value='".$StoreNumber."' name='StoreStack2'><br>";
				echo "</td></tr>";
			}
			if(count($_SESSION['store'.$StoreNumber])<10){ 
				echo "<tr><td id='AddCrate1'>";
				echo "Add Crate 1: <input type='radio' value='".$StoreNumber."' name='StoreStack1'>";
				echo "</td></tr>"; 
			}
			echo "</br>";
			$StoreStack = array_reverse($_SESSION[$Storename]);
			
			
			foreach ($StoreStack as $key => $value) {
				echo "<tr><td class='StoreCell'>";
				echo $value;
				echo "</td></tr>";
			}
			echo "</table>";
			echo "<b>Store " . $StoreNumber . " Stack</b><br>";
			echo  "Crates on stack: ".count($_SESSION['store'.$StoreNumber])."<br>";
			if (count($_SESSION['store'.$StoreNumber])>0){
				echo "<a href='ship.php?store=".$StoreNumber."'>Ship This Stack</a><br>";
			}else{
				echo "<font color='#A0A0A0'>Ship This Stack</font><br>";
			}	
			echo "</div>";
		}
		echo "</div>";
		echo "</form>";


	}
}		
require_once("foot.php");
?>
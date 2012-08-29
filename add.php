<?php
session_start();
require_once("head.php");
echo "<div id='UI'>";
if($_POST['name']==null){
	//DISPLAYS FORM
	if (count($_SESSION['warehouse']) == $maxWarehouseSize -1){
		echo "<b>WARNING: THERE IS ONLY ONE SPACE LEFT ON THE STACK!</b>";
	}
	echo "<form method='post' action='add.php'>";
	echo "Name of crate: <input type='text' size='14' maxlength='12' name='name'><br>";
	echo "<input type='submit' value='ADD' name='submit'></form>";
	echo "<a href='index.php'>BACK</a></div>";
}else{
	//SANITIZE AND VALIDATE
	$valid = False;
	$name = $_POST['name'];
	$nameSanitized = htmlspecialchars($name);
	if(strlen($nameSanitized)>0){
		$valid = True;
		
	}else{
		echo "Crate is invalid.<br>";
	}
	//SAVES IF VALID
	if($valid and count($_SESSION['warehouse'])<$maxWarehouseSize){
		array_push($_SESSION['warehouse'], $nameSanitized);
		require_once("UI.php");
	}elseif(!$valid){
		echo "Crate was invalid, please <a href='add.php'>resubmit.</a><br>";
	}else{
		echo "Warehouse stack full<br>";
		require_once("UI.php");
	}
	
}
echo "</div>";

require_once("display.php");
require_once("foot.php");
?>
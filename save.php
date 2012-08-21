<?php
session_start();
if(isset($_SESSION['inputarray'])){	
	$output = fopen("input.txt",'w');
	$count = count($_SESSION['inputarray'])-1;
	foreach ($_SESSION['inputarray'] as $key => $value) {
		foreach ($value as $innerkey => $innervalue) {
			fwrite($output, $innervalue);
			if ($innerkey != 3) {
				fwrite($output, ",");
			}elseif ($innerkey == 3 && $key<$count) {
				fwrite($output, "\n");
			}
			
		}
	}
	fclose($output);
	echo "Data successfully saved<br>";
	echo "<a href='index.php'>GO HOME</a>";
}else{
	echo "<a href='index.php'>GO HOME</a>";
}
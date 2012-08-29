<STYLE type="text/css">

a {
	color: #654321;
}

a:hover {
	color: #a06020;
}

input {
	width:10em;
	height: 1.2em;
	font-size: 1em;
}

input[type="submit"] {
width:5em;
background:#654321;
background: -webkit-gradient(linear, left top, left bottom, from(#a06020), to(#654321)); /* for webkit browsers */
background: -moz-linear-gradient(top,  #a06020,  #654321); /* for firefox 3.6+ */ 
color:#f0f0f0;
font-family: Tahoma, Geneva, sans-serif;
height:1.4em;
-webkit-border-radius: 15px;
-moz-border-radius: 15px;
border-radius: 15px;
border: 1p solid #999;
}

input[type="submit"]:active {
	background:#a06020;
	background: -webkit-gradient(linear, left top, left bottom, from(#654321), to(#a06020)); /* for webkit browsers */
	background: -moz-linear-gradient(top, #654321, #a06020); /* for firefox 3.6+ */ 
}

html, body {
	background-color: #f0f0f0;
	margin: 0;
	padding: 0;
  font-family: "Verdana"; 

}

#wall {
	position: absolute;
	left: 1024px;
	width: 10px;
	height: 760px;
	background-color: #000;
}

#container1 {
	float:left;
	width:100%;
	padding-top: 20px;

}

<?php

$tablewidth = 100;
$width = floor(100/$amountOfStores)-6;#9
for ($i=1; $i <= $amountOfStores; $i++) {
	$left =  (floor(100/($amountOfStores)-3))*$i;#-floor(3.5*$i);
	echo "#store";
	echo $i;
	echo " {\n";
	echo "width:";
	echo $width;
	echo "%;\n";
	echo "position:absolute;\n";
	echo "bottom:50px;\n";
	echo "left:";
	echo $left;
	echo "%;\n";
	echo "overflow:hidden;\n";
	echo "}\n";

}
?>

#Warehouse {
	width:<?php echo $width; ?>%;
	position:absolute;
	bottom:50px;
	left:2%;
	overflow:hidden;
}

#WarehouseCell {
  overflow: wrap;
	font-size: 280%;
 	word-wrap:break-word;
}

table {
	width:<?php echo $tablewidth; ?>%;
	table-layout:fixed;
	border-collapse:separate; 
}

table.StoreTable{
	border-spacing:2px;
	padding-left: 1px;
}

table.WarehouseTable{
	border-spacing:4px;
  padding-left: 1px;
}


td {
	word-wrap:break-word;
}

td.StoreCell {
	color: #f0f0f0;
	background-color: #804000;
	border: 5px solid #654321;
	height:40px;
}

td.WarehouseCell {
	color: #f0f0f0;
	background-color: #804000;
	border: 5px solid #654321;
	height:80px;
}

#AddCrate2 {
	color: #9E7D5C;
	background-color: #F0F0F0;
	border: 5px solid #8E6D4C;
	height:40px;
	font-size: 95%;
}

#AddCrate1 {
	color: #825E3B;
	background-color: #F0F0F0;
	border: 5px solid #724E2B;
	height:40px;
	font-size: 95%;
}

#UI {
	clear:both;
	position: absolute;
	left:2%;
	top:2%;
	width:98%;
	font-size: 170%;
}
</STYLE>

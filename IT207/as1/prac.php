<!DOCTYPE html PUBLIC
"-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Unishipit</title>
</head>
<body>
	
	<?php
	//Old numbers were 1,2,5 	
	define('TRAIN',1);
	define('TRUCK',3);
	define('CAR',7);
	if(!isset($_POST['calculate'])){
	?>
	<form method='post' action='index.php'>
	<div class='top'>Cost of Package Delivery</div>
	
	<div class='middle'>
		 Weight: <input type='text' name='weight' /> Pounds<br/>
		 By Train: <input type='text' name='train' /> miles<br/>
		 By Truck: <input type='text' name='truck' /> miles<br/>
		 By Car: <input type='text' name='car' /> miles
	
	</div>
	<div class='bottom'><input type='submit' name='calculate' value='Calculate' /></div>
	</form>
	<p class='link'>Proceed to <a href='part2.php'>Part 2</a></p>
	
	<?php
}
else{
	$train = calculator($_POST['weight'],$_POST['train'],TRAIN);
	$truck = calculator($_POST['weight'],$_POST['truck'],TRUCK);
	$car = calculator($_POST['weight'],$_POST['car'],CAR);
	
	echo "<div class='top'>Total Shipping Cost</div>
	
	<div class='middle'>
		<p>For a ".$_POST['weight']." pound package, it is estimated that:</p>
		<p>
		$".$train." Train freight cost<br/>
		$".$truck." Truck freight cost<br/>
		$".$car." Car freight cost<br/>
		</p>
	</div>
	<div class='bottom'>Total shipping charges: $".total($train,$truck,$car)."</div>
	
	<p class='link'>Last Modified: ".date("H:i M d, Y T", getlastmod())." | <a href='index.php'>Return to form page</a></p>";
}
//correct date format "H:i M d, Y T"
//extra function they may not have it
function total($v1,$v2,$v3){
	$result = number_format($v1+$v2+$v3, 2);
	return $result;
}
//FUNCTION#1  calculating the cost for each transport, they can do it differently but this function is a must.
function calculator($weight,$miles,$vehicle){
	
	$result = number_format(converter($weight*$vehicle*$miles),2);
	
	return $result;
}
// FUNCTION#2 converting cents to dollars.
function converter($total){
	return $total/100;
}
	?>
	</body>
	</html>


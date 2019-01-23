<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title> Ascending Order Comments</title>
</head>
<body>
<?php

$asc = file("comments.txt");
sort($asc);
print_r($asc);
$count = count($asc);
for($i = 0;$i<$count;$i++)
 		{
 		   $index =1;	
           $Field = explode(",",$asc[$i]);
           echo "<p> $index. ";
           echo " Name: <a href ='mailto:$Field[1]'>$Field[0] </a><br/>";
           echo "Comments: $Field[2] </p>";	
           echo "------------";
           $index++;
 		}
?>
<br/>
<a href = "viewComments.php"> Back to Comments Book </a><br/>
<a href = "index.html">Add more comments ? </a>
</body>
</html>


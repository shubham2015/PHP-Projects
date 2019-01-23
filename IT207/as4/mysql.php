<?php
define("DB_SERVER", "localhost:3307");
define("DB_USER", "root");
define("DB_PASSWORD", "");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD);
if($connect)
 {
 	$sql = "USE IT207";
 	mysqli_query($connect,$sql);
 	if(mysqli_query($connect, "INSERT INTO comments(name,email,comments) VALUES ('magic','mgamil','lakers match tonight')"))
 	{
 		echo"Success in adding";
 	}
     else
     	echo "Error: " . $sql . "<br>" . mysqli_error($connect);
 	$sql = "DELETE FROM comments WHERE id = 2";
 	if(mysqli_query($connect,$sql))
 		echo " Succes in deleteion";
 	else
 		echo "Error: " . $sql . "<br>" . mysqli_error($connect);

 	//$row = mysqli_fetch_assoc($result);
 	//print_r($row);
 	//echo"<br/>";
 	//for($i = 0 ;$i<)
 	
 	//$row = mysqli_fetch_assoc($result);
 	//print_r($row);
 	//$r = mysqli_fetch_row($result);
 	//print_r($r);
 	//echo "<p>Comment added successfully</p>";
 	//echo "<p> Name: <a href ='mailto:$row[2]'>$row[1]</a><br/>";
 	//echo "Comments: $row[3]</p>";

 }
//$sql = "CREATE TABLE comments (index varchar(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(40), email varchar(40), comments varchar(500))";
//if(mysqli_query($connect,$sql))
 //echo"succes database creation";
//else {
  //  echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    //}  
/*$sql = "CREATE TABLE comments (index int NOT NULL AUTO_INCREMENT, name varchar(40), email varchar(40), comments varchar(500))";
if(mysqli_query($connect,$sql))
 {echo "succes tabe";
 }
 else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    } 
$sql = "INSERT INTO comments(name,email,comments) VALUES ('shuibham','mail','njdfjnfvnjvvjnvnj')";
if(mysqli_query($connect,$sql))
{ echo "Added new ";}
else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
    } */
?>
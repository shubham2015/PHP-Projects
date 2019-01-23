<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	 <title> Comments Book </title>
</head>
<body>
<h2> Comments Book </h2> 
<?php
define("DB_SERVER", "localhost:3307");
define("DB_USER", "root");
define("DB_PASSWORD", "");
$conn = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD);


if($conn) 
{
 mysqli_query($conn,"USE IT207");
 if(!empty($_POST['delete']))
 {
 	$deleteIndex = $_POST['delete'];
 	
 	$sql = "DELETE FROM comments WHERE id = $deleteIndex";
 	if(mysqli_query($conn,$sql))
 	 echo "<h3> Comment Deleted</h3>";
 	else
 	  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 }	
 $result = mysqli_query($conn,"SELECT id,name,email,comments FROM comments");
 $rows = mysqli_num_rows($result);
 if($rows>0)
 {
 	for($i=0;$i<$rows;$i++)
    {
     mysqli_data_seek($result,$i);	
     $row = mysqli_fetch_row($result);
     echo "<p> $row[0] ";
     echo "Name :<a href ='mailto:$row[2]'>$row[1]</a><br/>";
     echo "Comments : $row[3]</p><br/>";	
     echo "--------------------------------------------";
    }

    echo "<p><a href ='database.html'>Add New Contact</a></p>";
 	echo "<p><a href = 'ascendingDb.php'>Sort in Ascending Order</a></p>";
 	echo "<p><a href = 'descendingDb.php'>Sort in Descending Order</a></p>";
 }
 else
 {
 	echo "<p>No comments are present";
 	echo "<a href='database.html'>Back to Home Page";	
 }
}

?>

<form action = "viewCommentsdb.php" method = "post">
Delete Comment number: <input type = "text" name = "delete"/>
<input type = "submit" value = "Delete Comment"/>
</form>
</body>
</html>
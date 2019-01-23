<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>New Contact</title>
</head>
<body>
<?php
if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]) && !empty($_POST["email"]) && !empty($_POST["number"]) &&                !empty($_POST["address"]) && !empty($_POST["city"]) && !empty($_POST["state"]) && !empty($_POST["zip"]))
{
   $fname = $_POST["firstname"];
   $lname = $_POST["lastname"];
   $email = $_POST["email"];
   $number = $_POST["number"];
   $add = $_POST["address"];
   $city = $_POST["city"];
   $state = $_POST["state"];
   $zip = $_POST["zip"];
   $FieldEntry = "--".$fname.",".$lname.",".$email.",".$number.",".$add.",".$city.",".$state.",".$zip;
   $File = fopen("PhoneBook.txt","a");
   if(fwrite($File,$FieldEntry)>0)
   {
     echo "<p>Contact has been added successfully</p>";
     echo '<a href = "index.html">Return to Directory </a>';
   }
   else
   {
     echo"<p>Contact is not added</p>";
     echo '<a href ="new.html">Return to add contact page</a>';
   }
   
}
else
{
  echo "<p> Please Enter all the data in the fields</p>";
  echo '<a href ="new.html">Return to add contact page</a>';
}
  
?>

</body>
</html>
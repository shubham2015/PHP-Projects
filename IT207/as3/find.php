<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title> Search Directory</title>
</head>
<body>
<?php

if(!empty($_POST["firstname"]) && !empty($_POST["lastname"]))
{
  $found = 0;
  $fname = $_POST["firstname"];
  $lname = $_POST["lastname"];
  if(file_exists("PhoneBook.txt"))
  {
  	
  	$FileRead = fopen("PhoneBook.txt","r");
  	$FileContent = file_get_contents("PhoneBook.txt");
    //Going through each contact list seperated from the --
  	$Fields = explode("--",$FileContent);
    //Total number of Fields
    $count = count($Fields);
    for($i=1;$i<$count;$i++)
    {
      //Taking each field and then going after each field seperated by comma
      $Field = explode(",",$Fields[$i]);
      //Compares 2 strings case sensitive
      if((!strcasecmp($Field[0],$fname)) && (!strcasecmp($Field[1],$lname)))
       {
        $found = 1;
       // echo "Found";
        print_r($Field); 
        echo "<form method ='post' action ='update.php'>
              <p>First Name <input type ='text' name ='new_firstname' value = '{$Field[0]}'>
                 Last Name <input type ='text' name ='new_lastname' value = '{$Field[1]}'><br/><br/>
                 Email Address <input type ='text' name='new_email' value = '{$Field[2]}'><br/><br/>
                 Phone Number <input type = 'text' name='new_number' value = '{$Field[3]}'><br/><br/>
                 Address <input type = 'text' name ='new_address' value = '{$Field[4]}'>
                 City <input type ='text' name ='new_city' value = '{$Field[5]}'><br/><br/>
                 State <select name ='new_state' value = '{$Field[6]}'>
                <option value = 'Arizona'>Arizona</option>
                <option value = 'California'>California</option>
                <option value = 'Texas'>Texas</option>
                <option value = 'Virginia'>Virginia</option>
                <option value = 'Washington'>Washington</option>
                <option value = 'WestVirginia'>West Virginia</option></select>
                Zip <input type = 'text' name='new_zip' value = '{$Field[7]}'>
                <input type = 'submit' value='Update info'>
                <input type='hidden' name='old_entry' value='$Field[$i]' />
              </p>
             </form>";
        echo "<p><b> Click on Update to update your info or click here to go back</b></p>";
        echo '<a href = "index.html"> Return to search page </a>';
       }
    }
   if(!empty($fname) && !empty($lname) && $found == 0){
     echo "<p> Contact Not Found</p>";
     echo '<a href ="index.html"> Return to search page </a>';
   }
  }
}
else
{
	echo"<p> Enter both first name and last name</p>";
	echo '<a href ="index.html"> Return to search page </a>';
}

?>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Office Hours Sign Up</title>
<link rel="stylesheet" type="text/css" href="table.css" />
</head>
<body>
<h1>Office Hours Sign Up</h1>
<?php

/* Display today's date via the PHP date() function */
//echo "<p>";
//echo "<a href='calendar.php'>Today is: </a>";
//print(date("l, F dS Y"));


$Month=date("m");
$Year=date("Y");

$Month=2;
$Year=2015;

/* Figure out how many days are in this month using the PHP checkdate() Function.
   We will loop and increment the $Day_Counter until we exceeed the number of Days
   for the Month [when the checkdate() function then returns False]. */
$Days_In_Month = 28;
while (checkdate($Month,$Days_In_Month,$Year)){
	$Days_In_Month++;
}

$Days_In_Month--;
//echo "</p>";

/* Now we need to figure out which day of the week the first day of the month falls
   under. */
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Sunday" ) {
	$Day_Of_Week = 1;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Monday" ) {
	$Day_Of_Week = 2;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Tuesday" ) {
	$Day_Of_Week = 3;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Wednesday" ) {
	$Day_Of_Week = 4;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Thursday" ) {
	$Day_Of_Week = 5;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Friday" ) {
	$Day_Of_Week = 6;
}
if ( date("l", mktime(0,0,0,$Month,1,$Year)) == "Saturday" ) {
	$Day_Of_Week = 7;
}

?>
<form method="post" action="calendar.php">
<p>
Student Name: <input type="text" name="name" />
Student Email: <input type="text" name="email" />
<input type="submit" value="Submit" />
<input type="reset" value="Clear" />
</p>
<?php
if (!empty($_POST['email']))
    $email = "Email successfully sent from " . $_POST['email'];
if (!empty($email))
	{
	echo $email;
	}
?>
<table border="4">
<?php
//echo "<tr><td colspan=\"7\" align=\"center\" valign=\"middle\">$Month  $Year</td></tr>";
echo "<tr><th colspan=\"7\" align=\"center\" valign=\"middle\">February, $Year</th></tr>";
?>
<tr height="5" bgcolor="white"><td>Sunday</td><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td></tr>
<?php
if (!empty($_POST['time']))
    $time = $_POST['time'];
if (!empty($_POST['name']))
    $name = $_POST['name'];

$daytoprint = 1;

for ($row =1; $row <= 6; $row++) {
// print each row
      echo "<tr>";
      for ($column = 1; $column <=7; $column++){
      // print each column
       if ($row == 1) {
	  if ($column < $Day_Of_Week){
              echo "<td>&nbsp</td>";
            }
          else {

              echo "<td valign='top'>$daytoprint<br />";
              switch ($column) {
                case 2:
			$arraytime = "mtime";
			break;
		case 3:
			$arraytime = "ttime";
			break;
		case 4:
			$arraytime = "wtime";
			break;
		case 5: $arraytime = "htime";
			break;
		case 6: $arraytime = "ftime";
			break;
		default:
			$arraytime = "";
               } // end switch

               if (!empty($_POST["$arraytime"]) && count($_POST["$arraytime"]) > 0)
              {
                foreach ($_POST["$arraytime"]  as $x){
                  if (isset($time) &&("$daytoprint".$x == $time) )
                    echo "$x --", $name, "<br />";
                  else
                    echo "<input type=\"radio\" name=\"time\" value=\"$daytoprint".$x."\" />". $x. "<br />";
                 }// foreach
               }// end if 
              echo "</td>";
              $daytoprint++;
          } // end else for if $column <
	}  // row = 1
       else {
         if ($daytoprint <= $Days_In_Month){
               echo "<td valign='top'>$daytoprint<br />";
              switch ($column) {
                case 2:
                        $arraytime = "mtime";
                        break;
                case 3:
                        $arraytime = "ttime";
                        break;
                case 4:
                        $arraytime = "wtime";
                        break;
                case 5: $arraytime = "htime";
                        break;
                case 6: $arraytime = "ftime";
                        break;
                default:
                        $arraytime = "";
               }

          if (!empty($_POST["$arraytime"]) && count($_POST["$arraytime"]) >0)
           {
                foreach ($_POST["$arraytime"]  as $x){
                  if (isset($time)&&("$daytoprint".$x == $time) )
                    echo "$x -- ", $name, "<br />";
                  else     
                    //echo "<input type=\"radio\" name=\"time\" value=\"$daytoprint".$x ."\" />". $x. "<br />";
                    echo '<input type="radio" name="time" value="'."$daytoprint".$x.'" />'.$x.'<br />';
                  if ($row ==2){
                       echo "<input type=\"hidden\" name=\"$arraytime"."[]\""." value=\"$x\" />";
                  }  
                } // end foreach
              }// end if count
            echo "</td>";
          } // end  $daytoprint
         else
               echo "<td>&nbsp</td>";
         $daytoprint++;
         } // end else 
       } // end for column
    echo "</tr>";
 } // for row

echo "</table>";

?>
</form>
</body>
</html>

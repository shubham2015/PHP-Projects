<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		Office Hours Sign Up
	</title>
<link rel="stylesheet" type="text/css" href="as2.css">
</head>
	<body>
		<h1> Office Hours Signup Form</h1>
		<?php
         date_default_timezone_set('UTC');
         //$month = date("F"); 
         //$d = mktime(0,0,0,02,1,2016);            
         $d = mktime(0,0,0,date("m"),1,date("Y"));  //Current month and year are passes as building the date 
         $f= date("w",$d);                          //'w' will Find the numeric rep of first day of month
         //echo $f;                                   //$f is first day of month in numerics
         echo "<br/>";
         $n = date("t");                              //number of days of the month
         ?>

         
		  <form method = "post" action = "calender.php">
			<input type = "text" name = "name" center>Student name
			<input type = "text" name = "email" center>Email 
			<br/><br/>
			<input type = "submit" value = "submit">
		 
		 <br/>
        <?php
        function artime($dow){
        switch($dow)
                 	{
                      case 1:
                       
                         $officetime = "mtime"; 
                         break;
                       
                      case 2:
                        $officetime = "ttime"; 
                         break;
                      case 3:
                        $officetime = "wtime"; 
                         break;
                      case 4:
                        $officetime = "rtime"; 
                         break;
                      case 5:
                       $officetime = "ftime"; 
                         break;
                      default:
                        $officetime = " ";                
                    }
                    return $officetime;
                }

        ?>
	    <?php
	        if(!empty($_POST['time']))
	        	$time = $_POST['time'];
	        if(!empty($_POST['name']))
	        	$name = $_POST['name'];
		    if (!empty($_POST['email']))
		    $email = "Email successfully sent from " . $_POST['email'];
		    if (!empty($email))
			echo $email;
		    echo "<h1><b>" .date("F",$d)."&nbsp".date("Y",$d)."</h1></b>" ;              //Prints the month and year in blocks
	    ?>
	    <table width ="100%" bgcolor="#E0E0E0">
         <tr>
         <?php
          for($d=1;$d<=7;$d++)
          {
          	echo"<th>".date("l",mktime(0,0,0,07,$d,2018))."</th>";              // Printing the first row with names of days
          }
         ?>
         
         </tr> 	
             <!-- Implementation for first row seperately --> 
             <tr>
         	<?php
         	 $startdate = 1;
         	function numofblanks($f)
            {
             switch($f)
             {
             	case 0:
             	{
             		$blanks = 0;
             		break;
             	}
             	case 1:
             	{
             		$blanks = 1;
             		break;
             	}
             	case 2:
             	{
             		$blanks = 2;
             		break;
             	}
             	case 3:
             	{
             		$blanks = 3;
             		break;
             	}
             	case 4:
             	{
             		$blanks = 4;
             		break;
             	}
             	case 5:
             	{
             		$blanks = 5; 
             		break;
             	}
             	case 6:
             	{
             		$blanks = 6;
             		break;
             	}
             	default:
             	 $blanks = 0;
             }
             return $blanks;
         }
            $blanks = numofblanks($f); 
            //echo $blanks;
            $remstart = (7-$blanks);
            echo "<br/>";
            //echo $remstart;
            //Printing the first row which differs based on the number of blanks
            for($i=0;$i<$blanks;$i++){
              echo "<td>&nbsp</td>";                //Printing the number of blanks
            }
            for($j=1;$j<=$remstart;$j++)            //Printing the numbers after the blanks
            {
                                      //(0,0,0,10,01,2018)
                 $dow= date("w",mktime(0,0,0,date("m"),$startdate,date("Y"))); //Day of the week
                 //echo $dow;
                 echo "<td valign = top >".($startdate)."<br/>"; //Printing of dates start here
                 $officetime = artime($dow);         //getting the array of time submitted

                if (!empty($_POST["$officetime"]))
                {
                foreach ($_POST["$officetime"]  as $x)
                {
                  //print_r($officetime);
                  //print_r($x);
                  //echo $startdate.$x;


                 /* if (isset(($startdate-1).time) &&(($startdate-1).time)==$x)
                    {echo ($startdate-1).time;
                    echo "$x --". $name. "<br />";}
                  printer_draw_elipse(printer_handle, ul_x, ul_y, lr_x, lr_y)
                    {echo "<input type= radio multiple name =($startdate-1).time value= $x />". $x. "<br />"; }
                  echo "<input type= hidden name=  $officetime"."[]"." value= $x />";*/
                  //echo magic;
                 // echo ($startdate-1).time;
                
                if (isset($time) && ("$startdate".$x == $time))
                    {//echo ($startdate-1).time;
                    echo "$x --". $name. "<br />";}
                  else
                    //The value for time variable is stored as $startdate.radio clicked  
                    {echo '<input type= radio multiple name = time value= "'."$startdate".$x.'" />'. $x. '<br />'; }
                  echo "<input type= hidden name=  $officetime"."[]"." value= $x />";

                 }
               }
                  // $(($startdate-1).time)
               echo "</td>";
               $startdate++;
            }  
            ?> 
             </tr>

             <!--Printing of remaining rows-->
             <?php
             for($row=1;$row<=5;$row++)
            {
              echo "<tr>";

              for($col=1;$col<=7;$col++)
              {
              	 $dow= date("w",mktime(0,0,0,date("m"),$startdate,date("Y")));
               echo "<td valign = top>".($startdate)."<br/>";
               $officetime = artime($dow);
                if (!empty($_POST["$officetime"]))
                {
                foreach ($_POST["$officetime"]  as $x){
                  if (isset($time) &&("$startdate".$x == $time) )
                    echo "$x --".$name."<br />";
                  else
                    echo '<input type= radio multiple name = time value= "'."$startdate".$x.'" />'. $x. '<br />';
                 }
               }

               echo"</td>";
               $startdate++;
               if($startdate==$n)
              	break;
              }
              echo "</tr>";
              if($startdate==$n)
              	break;
            }
         	?>
         
	    </table> 
         </form>
	</body>

</html>

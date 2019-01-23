<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		Assignment 1
	</title>
	<meta charset="UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale =1">
	<meta name = "author" content = "Shubham Pudi">
	<link rel = "stylesheet" type= "text/css" href="./../css/homestyle.css">

 </head>
 <body>
 <div class ="container">
 	<header>
 	<?php
 	include('../course.php');
 	?>
    </header>
    <div class = flex-container"> 
    <?php 
    include('../nav.php');
    ?>
    <div class = "lab-content">
    	
     <div class = "calculator">
       <form action="finalgrade.php" method="post">
            <h3>Participation</h3>
            Earned: <input type="text" name="earnedParticipation" />
            Max: <input type="text" name="maxParticipation" />
            Weight (percentage): <input type="text" name="weightParticipation" />
            <h3>Quizzes</h3>
            Earned: <input type="text" name="earnedQuiz" />
            Max: <input type="text" name="maxQuiz" />
            Weight (percentage): <input type="text" name="weightQuiz" />
            <h3>Lab Assignments</h3>
            Earned: <input type="text" name="earnedLab" />
            Max: <input type="text" name="maxLab" />
            Weight (percentage): <input type="text" name="weightLab" />
            <h3>Practica</h3>
            Earned: <input type="text" name="earnedPracticum" />
            Max: <input type="text" name="maxPracticum" />
            Weight (percentage): <input type="text" name="weightPracticum" />
            <br /><br />
            <input type="submit" />
        </form>



    </div>
    </div>
    <footer>
 	<?php 
 	include('../footer.php');
 	?>
 </footer>
 </div>
 </body>
 </html>







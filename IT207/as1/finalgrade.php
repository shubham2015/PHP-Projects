<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		Grade Determiner
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
 	include('course.php');
 	?>
    </header>
    <div class = flex-container"> 
    <?php 
    include('nav.php');
    ?>
    <div class = "lab-content">
           	<?php
              $parEarn = $_POST['earnedParticipation'];
              $parMax = $_POST['maxParticipation'];
              $parWei = $_POST['weightParticipation'];
              $quizEarn = $_POST['earnedQuiz'];
              $quizMax = $_POST['maxQuiz'];
              $quizWei = $_POST['weightQuiz'];
              $labEarn = $_POST['earnedLab'];
              $labMax = $_POST['maxLab'];
              $labWei = $_POST['weightLab'];
              $pracEarn = $_POST['earnedPracticum'];
              $pracMax = $_POST['maxPracticum'];
              $pracWei = $_POST['weightPracticum'];


            function percentage($a,$b)
            {
              $percent = ($a/$b)*100;
              return $percent;
            }

            function weightValue($c,$d,$e)
            {
             $weight = (percentage($c,$d) * $e)/100 ;
             return $weight;
            }

            $parweight = weightValue($parEarn,$parMax,$parWei);
            $quizWeight = weightValue($quizEarn,$quizMax,$quizWei);
            $labWeight = weightValue($labEarn,$labMax,$labWei);
            $pracWeight = weightValue($pracEarn,$pracMax,$pracWei);
            $total = $parweight+$quizWeight+$labWeight+$pracWeight;

            function lettergrade($total) {
            if ($total >= 95) {
            $lettergrade = "A+";
            }
            else if ($total < 95 && $total >= 90 ) {
                $lettergrade = "A";
            }
            else if ($total < 90 && $total >= 85) {
                $lettergrade = "B+" ;
            }
            else if ($total < 85 && $total >= 80) {
                $lettergrade = "B" ;
            }
            else if ($total < 80 && $total >= 75) {
                $lettergrade = "C+" ;
            }
            else if ($total < 75 && $total >= 70) {
                $lettergrade = "C" ;
            }
            else if ($total < 70 && $total >= 60) {
                $lettergrade ="D" ;
            }
            else if ($total < 60 && $total >= 0) {
                $lettergrade = "F" ;
            }
            else {
                $lettergrade = "NOT INVAILD";
            }
            return $lettergrade;
}

    echo "<p><b>Your final total percentage is " .$total. "% and you earned".lettergrade($total)."</b></p>";
    ?>

    </div>
    </div>
    <footer>
 	<?php 
 	include('footer.php');
 	?>
 </footer>
 </div>
 </body>
 </html>









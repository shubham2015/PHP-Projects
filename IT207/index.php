<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		Home page ! Welcome
	</title>
	<meta charset="UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale =1">
	<meta name = "author" content = "Shubham Pudi">
	<link rel = "stylesheet" type= "text/css" href="./css/homestyle.css">

 </head>
 <body>
 <div id ="container">
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
    	<div class = "lside">
    		<div class = "img" style = "height:60px";> </div>
    			<img src ="profile.jpg" alt = "shubham" width="350" height = "300">
    	    <h2> Summary </h2>
   
    	    <p> My name is Shubham Pudi currently a masters student in Computer Science with a concentration in Artificial Intelligence. </p>

        </div>
        <div class = "rside">
        	<h3> Professional and Personal Details</h3>
        	<p> Born and grew up in India. I graduated with a bachelors degree in Computer Science and then moved to America in 2017 for advanced studies. Currently I am a GTA for IT 207 </p>

        </div>
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







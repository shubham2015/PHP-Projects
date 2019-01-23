<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<title>New Comment</title>
</head>
<body>
<?php
 if(!empty($_POST["name"]) && !empty($_POST["email"]))
 {
    $found =0;
 	$name = $_POST["name"];
 	$email = $_POST["email"];
 	$comments = $_POST["comments"];
 	$newEntry = $name.",".$email.",".addslashes($_POST["comments"])."\n";
    if(file_exists("comments.txt"))
    {
       $FileContents = file("comments.txt");
       $num = count($FileContents);
       for($i = 0; $i<$num; $i++)
       	{
       		$Field = explode(",",$FileContents[$i]);
       		if(strcasecmp($name,$Field[0])==0)
       		{
               $found = 1;
               break;
       		}
       	}
    }
    if($found==1)
    {
    	echo "<p> Comment already present under for the user. Cannot add</p>";
    }
    else
        {
        	$File = fopen("comments.txt","a");
            if(fwrite($File,$newEntry)>0)
            {
            	echo "<p> Comment added successfully</p><br/>";
            	echo "<p> Name: <a href ='mailto:$email'>$name</a><br/>";
                echo "Comments: $comments</p>";
            }
        }
   echo "<a href = 'index.html'>Someone else want to comment?</a><br/>";
   echo "<a href = 'viewComments.php'>View comments</a>";
  }
  else
  {
  	echo "<p>Please enter all the details</p>";
  	echo "<a href = 'index.html'>Return back to home page</a><br/>";
  }

 ?>

 
</body>
</html>

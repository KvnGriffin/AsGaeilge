<?php
include_once('GoogleTranslate.php');
  
    $search = trim($_GET['search_term']); // trim whitespace at start and end to ensure no empty query is submitted
    if($_GET['submit']) 
    {
        if(strlen($search) == 0) // error handling for empty search
        {
          echo "<p>Error: empty search</p>";
        }
        else 
        {
            $irish = googleTranslate($search); // call googleTranslate passing $search as input
            echo "<b>".$search."</b> translated to Irish: <i>".$irish."</i>";
            
            /* Next check to see if term is already in the database, incase user mistakengly
             * presses enter after the term has been displayed from the jquery predictive search, 
             * if it is not in the database (number of rows returned from mysql query) insert it for 
             * future reference  */
            
            $con = mysql_connect("localhost","root","BandWat250");
                if (!$con)
                {  
                    die('Could not connect: ' . mysql_error());
                }
            mysql_select_db("Translate", $con);
            
            $query = "SELECT English FROM Dictionary 
                       WHERE ENGLISH = '$search'";
                       
            $result = mysql_query($query);
            if(mysql_num_rows($result) == 0 ) // if not in database insert it
            {
				$sql = "INSERT INTO Dictionary (English, Irish)
				VALUES ('$search', '$irish')";
				if (!mysql_query($sql, $con))
                    {
	                 die('Error: '.mysql_error());
                    }
		    }
            mysql_close($con);

        } // end else
    } // end first if
?>

<?php

    $con = mysql_connect("localhost","root","BandWat250");
        if (!$con)
        {  
            die('Could not connect: ' . mysql_error());
        }

    mysql_select_db("Translate", $con);

    $term = strip_tags(substr($_POST['search_Term'],0,100));
    $term = mysql_escape_string($term);

    $sql = "SELECT English, Irish
        FROM Dictionary WHERE English LIKE '$term'
        order by English asc";
        
    $result = mysql_query($sql);


    if (mysql_num_rows($result) > 0) {
        while($row = mysql_fetch_assoc($result)) {
	        echo "<b>".$row['English']."</b>";
            echo " translated to Irish: ", "<i>".$row['Irish']."</i>","<br>";
            echo "<br>";
        } // end while
    } // end if 

?> 

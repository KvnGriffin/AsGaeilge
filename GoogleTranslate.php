<?php
 
    function googleTranslate($query1)
    {
		/****************     Google Translate API    **************/
        $query = urlencode($query1);     
        $google = file_get_contents("https://www.googleapis.com/language/translate/v2?key=**** YOUR API KEY HERE****&source=en&target=ga&q=".$query."");
        $decodegoogle = json_decode($google,TRUE); // TRUE for in array format
      
        foreach($decodegoogle['data']['translations'] as $decode) { // process JSON file
			
            return $decode['translatedText'];
		}
         
    }
         
?>
  

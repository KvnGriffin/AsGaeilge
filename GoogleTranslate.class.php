<?php
 
 class GoogleTranslate {
	
	// class variables 
	private $source;
	private $target;
	private $query;
	
	// constructor
	function __construct($lang_from, $lang_to, $phrase) {
	    
	    $this->source = $lang_from;
	    $this->target = $lang_to;
	    $this->query = $phrase; 
	}
	
	// getter
	public function get_source() {
	    return $this->source;	
	}
    
    // getter
    public function get_target() {
	    return $this->target;
	}
    
    // getter
    public function get_query() {
	    return $this->query;
	}
    
    // function queries Goolge API
    function googleTrans()
    {
		$query = urlencode($this->query);  
        $source = urlencode($this->source);
        $target = urlencode($this->target); 
        $google_response = file_get_contents("https://www.googleapis.com/language/translate/v2?key=AIzaSyDIoMMdU1TM_8pCtVK--TLjF08Nb2rWOao&source=".$source."&target=".$target."&q=".$query."");
        $decoded = json_decode($google_response,TRUE); // TRUE for in array format
        
        foreach($decoded['data']['translations'] as $transs) {
            return trim($transs['translatedText'],'.'); // trim "." that surround returned phrase.
		}
    } // end of googleTrans()
     
    
  }  // end of class GoogleTranslate
?>
  

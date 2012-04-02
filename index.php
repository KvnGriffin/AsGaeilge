
<html> 
<head>
<link rel="stylesheet" type="text/css" href="trans.css"> 
<script type="text/javascript" src='jquery-1.7.1.js'> </script>
<script type="text/javascript" src='functions.js'> </script>
<title>Welcome!</title> 
</head> 
<div id="wrapper"> 
<body> 

<h1>As Gaeilge</h1> 
<div>    

<form>
    <label form="search_term">Please enter your word</label> 
    <input type="text" name="search_term" id="search_term" onkeyup="dictionary_search(this.value);"/> 
    <input type="submit" method="get" value="Translate" name="submit" action="trans.php" id="submit_button"/> 
    </form>
</div> 
    
<div id="search_results">
<?php
include_once('controller.php');
?>
</div> 

</div>
</body> 
</html>


  
function dictionary_search(value) { 
    $.post("find.php", {search_Term:value}, function(data) {
		    $("#search_results").html(data);  
         });
    }

function checkLength(){		
	if(document.getElementById("MigraineStartTimestamp").value.length !=19){
		alert("Please enter Start date in correct format YYYY-MM-DD HH:MM:SS");
		return false;
	}
	else if(document.getElementById("MigraineEndTimestamp").value.length !=19){
		alert("Please enter End date in correct format YYYY-MM-DD HH:MM:SS");
		return false;
	}
	return true;
}

function highlight(id1, id2){
 		$(id1).css("background-color", "yellow");
 		$(id2).css("background-color", "yellow");
 }

function compareDates() {     
	if(!checkLength()){
		return false;
	}

    var startDate = new Date(document.getElementById("MigraineStartTimestamp").value);
    var endDate = new Date(document.getElementById("MigraineEndTimestamp").value);

    if ( endDate.getFullYear() >= startDate.getFullYear() &&
            endDate.getMonth() > startDate.getMonth() &&
       		(endDate.getDate() > startDate.getDate() || endDate.getDate() < startDate.getDate()) &&
	        (endDate.getTime() > startDate.getTime() || endDate.getTime() < startDate.getTime() || endDate.getTime() == startDate.getTime())
	    ){
	 			return true;
     }
     else if ( endDate.getFullYear() >= startDate.getFullYear() &&
            endDate.getMonth() > startDate.getMonth() &&
	        endDate.getDate() == startDate.getDate() && 
	        endDate.getTime() > startDate.getTime()
	    ){
	 			return true;
     }
     else if ( endDate.getFullYear() >= startDate.getFullYear() &&
	            endDate.getMonth() == startDate.getMonth() &&
	            	endDate.getDate() > startDate.getDate() &&
		            	(endDate.getTime() > startDate.getTime() || endDate.getTime() < startDate.getTime() || endDate.getTime() == startDate.getTime())
	        ){
	        	return true;	
    } 
    else if ( endDate.getFullYear() >= startDate.getFullYear() &&
	            endDate.getMonth() == startDate.getMonth() &&
	            endDate.getDate() == startDate.getDate() && 
	            endDate.getTime() > startDate.getTime()     
	        ){
	        	return true;	
    } 
    else if ( endDate.getFullYear() == startDate.getFullYear() &&
        endDate.getMonth() == startDate.getMonth() &&
        endDate.getDate() == startDate.getDate() &&
        endDate.getTime() == startDate.getTime() ) 
        { 
         alert ("End Date is same as Start Date");
         highlight("#MigraineStartTimestamp","#MigraineEndTimestamp");
         return false;
    }
    else {
         alert ("End Date is before Start Date");
         highlight("#MigraineEndTimestamp","#MigraineEndTimestamp");
         return false;
    }
 }

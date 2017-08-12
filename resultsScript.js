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
//Citation: https://stackoverflow.com/questions/7763327/how-to-calculate-date-difference-in-javascript(trisweb answer)
//Checks if there is at least 1 week gap between two dates.
function compareDates() {       
    if(!checkLength()){
         return false;
    }
     var startDate = new Date(document.getElementById("MigraineStartTimestamp").value);
     var endDate = new Date(document.getElementById("MigraineEndTimestamp").value);

     var difference = endDate - startDate;
     var numberOfDays = Math.floor((difference)/(1000*60*60*24));

     if(numberOfDays>=7){
     	return true;

     }
     else{
     	alert("Please make sure the difference from Starting to Ending date is at least a week.")
        highlight("#MigraineStartTimestamp","#MigraineEndTimestamp");
     	return false;
     }       
}
   

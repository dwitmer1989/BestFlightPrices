phpResponse = "hello!"; 

function lookupFlights(){
    alert("Looking up flights!"); 
}

function getCityCode(){
    document.getElementById("cityCodePrompt").style.display="flex"; 
}

function hidePrompt(){
    document.getElementById('cityCodePrompt').style.display='none'; 
}

function fillOriginIATA(){
    hidePrompt(); 
}



function fillIATACodes(){
    $('#IATASelect').html(getRemote()); 
}

function getRemote() {
    return $.ajax({
        type: "GET",
        url: "./php/getCities.php",
        async: false
    }).responseText;
}





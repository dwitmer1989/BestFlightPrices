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
    var ajax = new XMLHttpRequest(); 
    var method = "GET"; 
    var url = "./php/getCities.php"; 
    var asynchronous = true; 

    ajax.open(method, url, asynchronous);
    ajax.send(); 

    ajax.onreadystatechange=function(){
        if(this.readyState==4 && this.status ==200){
            alert(this.responseText); 
        }
    }
}




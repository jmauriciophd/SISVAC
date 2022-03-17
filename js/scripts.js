
var inputs = document.querySelectorAll("input");
var button = document.querySelector("button");

function checkImputs(inputs){
    var filled = true;
    inputs.forEach(function(input){
        if(input.value === ""){
             filled = false;
        }

    });
    return filled;
}
inputs.forEach(function(input){
    input.addEventListener("keyup", function(){
        if(checkImputs(input)){
            button.disabled = false;
        }else{
            button.disabled = true;
        }
    })
})
function isBlur(){
    const inputs = document.querySelector("input");
    inputs.blur();   
}
function executando(){  
    
}



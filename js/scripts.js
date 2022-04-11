
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
function selection(obj){ 
     if(obj == "Selecione o local de vacinação"){
        document.getElementById('formBuscar').style.display ="block";
     }{
        document.getElementById('formBuscar').style.display ="none";

     }
     focusMethode = function getFocus(){
         document.getElementById('myTextFocus').focus();
     }
}
function executar(){ 
    
}
function delay(n){ 
    return new Promise(function(resolve){
        setTimeout(resolve,n * 1000);        
    })
}
async function myassyncFunction(){
    await delay(executar());
}
myassyncFunction();
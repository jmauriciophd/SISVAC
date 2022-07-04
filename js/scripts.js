    window.onload = function() {

        document.getElementById("valorCampo").focus();
        var inputs = document.querySelectorAll("input");
        checkImputs(inputs);
    }        

var submit_gravar = document.getElementsByClassName("submit-gravar");

function submit_gravar(){
    var alert = document.getElementsByClassName("alert");
    if(alert.value == ""){
        alert.style='display:block';
    }else{
        alert.style = 'display: none'
    }
}
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
    const inputbutons = document.querySelector("input");
    inputbutons.focus();   
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
    var formreg  =  document.getElementById("valorCampologin").focus(); 
    document.getElementById("#valorCampo").focus();
}
function delay(n){ 
    return new Promise(function(resolve){
        setTimeout(resolve,n * 1000);        
    })
}
async function myassyncFunction(){
    await delay(executar());
}


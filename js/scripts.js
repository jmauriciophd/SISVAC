
var inputs = document.querySelectorAll("input");
var button = document.querySelector("button");
var submit_gravar = document.getElementsByClassName("submit-gravar");

var alert = document.getElementsByClassName("alert");
if(alert.value == ""){
    alert.style='display:block';
}else{
    alert.style = 'display: none'
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
    alert("BLUR")
    const inputbutons = document.querySelector("#input");
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
    var formreg  =   document.getElementsByClassName("cadastrar_reg");   
}
function delay(n){ 
    return new Promise(function(resolve){
        setTimeout(resolve,n * 1000);        
    })
}
async function myassyncFunction(){
    await delay(executar());
}
window.onload = function () {
     var button = document.getElementById("valorCampo").focus();
     document.addEventListener("keypress",function(e){
         if(e.keycode == 13){
            document.getElementById("valorCampo").onblur();
            document.getElementById("valorCampo2").focus();
         }else{
            document.getElementById("valorCampo").focus();
         }
     })
}
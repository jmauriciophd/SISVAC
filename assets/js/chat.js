$(document).ready(function(){
$("#fechar").bind('click',function(){
	$(".chat").toggle().hide("slow");
});
$(".contact").bind('click',function(){
		$(".chat").show("slow").css("display","block");
		$(".chat").show("slow");
	});
});
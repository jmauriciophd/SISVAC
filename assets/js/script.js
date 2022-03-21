function time(obj) {
	setTimeout(function(){
		obj.hide();
	},5000);
}
function sugestao(id){
	if(id !== ''){	
		jQuery.ajax({
			url:'http://10.16.0.187:8090/redesocial/perfil/sugestao',
			type:"POST",
			data:{id:id},
			success:function(data){
				if(data){
					jQuery('.sugestoes'+id).fadeOut().remove();
				}
			}
		});
	}
}
function aprovarSolicitacao(id){
	if(id !== ''){	
		jQuery.ajax({
			url:'http://10.16.0.187:8090/redesocial/home/aprovarSolicitacao',
			type:"POST",
			data:{id:id}
		});
	jQuery('.requisit'+id).fadeOut().remove();
	}
}
function like(obj){
	notificacao(obj);
	var idpost = jQuery(obj).attr('data-idpost');
	var liked  =  jQuery(obj).attr('data-liked');
	var likes =  jQuery(obj).attr('data-likes');
	var texto='';
	if(liked === '0'){		
		liked = 1;
		likes++;
		texto = "Descurtir";
	}else{		
		liked = 0;
		likes--;
		texto = "Curtir";
	}
	
	jQuery(obj).attr('data-liked',liked);
	jQuery(obj).attr('data-likes',likes);
	jQuery(obj).html(texto+'('+likes+')');

	jQuery.ajax({
		type:'POST',
		url:'http://10.16.0.187:8090/redesocial/home/like',
		data:{idpost:idpost}		
	});
	jQuery('.msg').remove().fadeOut();
}
//retorno de dados
	function mudarCor(obj){
		var id = jQuery(obj).attr('id');
		var nova_cor = CorAleat();
		jQuery("#"+id).css("border-left","4px solid "+nova_cor);
		}		
    function Hx() {return parseInt((Math.random() * 255)).toString(16); }
    function CorAleat() {return "#" + Hx() + Hx() + Hx(); }
    
//Testando a função:
    function comentar(obj){
    if(obj){
    	console.log(typeof(obj));
    }
	var coment = jQuery("#coment").val();
	var idpost = jQuery(obj).attr('data-idpost');
	if(coment ===""){		
            jQuery(".msg").text('Campo comentario está vazio');
		}else{
            jQuery.ajax({
                url:'http://10.16.0.187:8090/redesocial/home/comentar',
                type:'POST',
                data:{coment:coment,idpost:idpost},
                success: function(obj){
                	 window.location.reload();
                	jQuery('#coment').val('');                    
                 }
            });
        }
    }
    jQuery(".menu").hover(function() {
	  jQuery( ".sub-menu" ).slideDown( "slow", function() {
	    alert("funfa");
	  });
	});

jQuery("#pesquisar").on('click',function(){
	var valor = jQuery('#pesquisa').val();
	jQuery.ajax({
		type:'POST',
		url:'home/pesquisar',
		dataType:'json',
		data:valor,
		cache: false,
		success:function(data){
			jQuery('.conteudo-destaque').html(data.nome);				 
			
		  },error:function(){
	  			console.log("Sua pesquisa para nao tem nehum resultado");
	 		 }
		});
	});		
 
 function atualizar(){
 	jQuery.get("ajax",function(resultado){
 		while(resultado<0){
 		 	console.log("chegou");
 		 }
 	});
 }
 function bloquearBotao(obj){ 
    	var completo = 0;
        completo++;
        jQuery(obj).hide();

        if(completo>=5 && completo<=9){
            jQuery('#entrar').hide();            
        }
        if(completo>9){
        	jQuery('#entrar').show();  
        }
    }
    jQuery("#arquivo").change(function() {
    jQuery(this).prev().html($(this).val());
});
setTimeout('atualizar()',5000);
bloquearBotao();
 atualizar();

function notificacao(obj,id=''){
	var idpost = jQuery(obj).attr('data-idpost');
	var liked  =  jQuery(obj).attr('data-liked');
	if(liked ==1){
		jQuery("#notificacao").text(1);
	}else{
		jQuery("#notificacao").text(0);
	}
}
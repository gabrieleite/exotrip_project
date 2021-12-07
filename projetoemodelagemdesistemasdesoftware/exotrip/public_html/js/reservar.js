$(function(){
  $("form").submit(function(e){
    e.preventDefault();
    $("button[name=submit]").hide();
    $("button[name=loading]").show();
    var form = $(this);
    var btnsubmit = form.find("div[name=submit]").hide().next().show();
    $.post("php/reservar.php", {post:form.serialize()},
    	function(response){
    		if(!response.success){
          $("button[name=submit]").show();
          $("button[name=loading]").hide();
          SwAlertError.fire({text:response.error});
    		}else{
          $("button[name=submit]").show();
          $("button[name=loading]").hide();          
          SwAlertSuccess.fire({text: "Reserva solicitada com sucesso!"}).then(()=>{
            location.href = url+'/painel';
          });
    		}
        btnsubmit.hide().prev().show();
    	},'json'
    );
  });
});
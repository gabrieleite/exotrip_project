$(function(){
  $("form").submit(function(e){
    e.preventDefault();
    var form = $(this);
    var btnsubmit = form.find("div[name=submit]").hide().next().show();
    $.post("php/cadastro.php", {post:form.serialize()},
    	function(response){
    		if(!response.success){
          SwAlertError.fire({text:response.error});
    		}else{
          SwAlertSuccess.fire({text: "Cadastrado com sucesso!"}).then(()=>{
            location.href = url+'/login';
          });
    		}
        btnsubmit.hide().prev().show();
    	},'json'
    );
  });
});
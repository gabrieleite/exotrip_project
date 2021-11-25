// $(function(){

//   let form = $("form[name=form-orcamento]"),
//     	btnSubmit = $("input[name=submit]");

//   let submit = function(e){
//   e.preventDefault();

//   $.post("php/orcamento.php", {post:form.serialize()}, (response)=>{
//     if(!response.success){
//       $('.w-form-fail div').text("Oops! "+response.error);
//       $('.w-form-fail').show();
//     }else{
//       $('.w-form-fail').hide();
//       $('.w-form-fail div').text();
//       $('.w-form-done div').text('Obrigado! Sua mensagem foi recebida com sucesso');
//       $('.w-form-done').show();

//       setTimeout(function(){
//         window.location.href = "orcamento";
//       }, 1500);      
//     }
//   });
// };
// btnSubmit.unbind().click(submit);
// form.submit(submit);

// });
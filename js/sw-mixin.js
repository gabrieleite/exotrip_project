const SwAlertError = Swal.mixin({
  width:"30%",
  type:"error",
  title:"Ops...",
  text:"Não foi possível realizar a operação desejada"
});

const SwAlertSuccess = Swal.mixin({
  width:"30%",
  type:"success",
  title:"Sucesso!",
  text:"Operação realizada com sucesso"
});

const SwAlertConfirm = Swal.mixin({
	width:"30%",
	title:"Confirmar ação",
	type:"warning",
  showCancelButton:true,
  cancelButtonColor:"#db2828",
  cancelButtonText:"Não",
  confirmButtonColor:"#21ba45",
  confirmButtonText:"Sim"
});
 
const SwToastSuccess = Swal.mixin({
  type: 'success',
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  customClass: 'SwToastSuccess'
});
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Painel</title>
  <link rel="stylesheet" type="text/css" href="plugins/semantic/semantic.min.css">
  <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="plugins/semantic/semantic.min.js"></script>
</head>
<body>
  <div class="ui secondary  menu" style="padding: 10px;">
    <a href="painel" class="item">
      Painel
    </a>
    <a href="reservar" class="item">
      Reservar
    </a>
    <div class="right menu">
      <a name="logout" class="ui item">
        Logout
      </a>
    </div>
  </div>

  <h1 style="padding: 10px;"><?php echo sprintf("Olá %s", UsuarioLogado::getNome());?></h1>
  <div style="padding: 10px;" class="ui grid">
    <div class="eight wide column">
      <p style="font-size: 20px">Para realizar sua reserve acesso o menu clicando no botão reservar!</p>
    </div>
  </div>
<script>
  $("a[name=logout]").click(function(){
    SwAlertConfirm.fire({
      text: "Deseja sair do sisema?"
    }).then((result) => {
      if(result.value)
      {
        $.post(url+"/php/logout.php", (response)=>{
          if(response.success){
            location.href = url;
          }else{
            SwAlertError.fire({text:response.error});
          }
        });
      }
    });    
  });
</script>
</body>
</html>
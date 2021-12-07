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
      <a name="usuarioLogado" class="ui item">
        <?php echo  UsuarioLogado::getNome();?>
      </a>      
      <a name="logout" class="ui item">
        Logout
      </a>
    </div>
  </div>
  <div style="" class="ui grid">
    <div class="sixteen wide column">
      <section class="ftco-section contact-section">
        <div class="container">
          <div class="row d-flex mb-5 contact-info justify-content-center">
              <!--
            <div class="col-md-8">
              <div class="row mb-5">
                <div class="col-md-4 text-center py-4">
                  <div class="icon">
                    <span class="icon-map-o"></span>
                  </div>
                  <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
                <div class="col-md-4 text-center border-height py-4">
                  <div class="icon">
                    <span class="icon-mobile-phone"></span>
                  </div>
                  <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
                <div class="col-md-4 text-center py-4">
                  <div class="icon">
                    <span class="icon-envelope-o"></span>
                  </div>
                  <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                </div>
              </div>
            </div>
              -->
          </div>
          <div class="row block-9 justify-content-center mb-5">
            <div class="col-md-8 mb-md-5">
              <h2 class="text-center">Preencha os dados da reserva</h2>
              <form action="#" class="bg-light p-5 contact-form">
                <div class="form-group">
                  <label>Destinos</label>
                  <select class="form-control" name="destino">
                    <option value="">Selecionar</option>
                    <option value="Arraial D ajuda">Arraial D ajuda</option>
                    <option value="Bora Bora">Bora Bora</option>
                    <option value="Caldas Novas">Caldas Novas</option>
                    <option value="Fortaleza">Fortaleza</option>
                    <option value="Florianópolis">Florianópolis</option>
                    <option value="Gramado">Gramado</option>
                    <option value="Ilha Santorini">Ilha Santorini</option>
                    <option value="Lençóis Maranhenses">Lençóis Maranhenses</option>
                    <option value="Maceió">Maceió</option>
                    <option value="Natal">Natal</option>
                    <option value="Porto de Galinhas">Porto de Galinhas</option>
                    <option value="Rio de Janeiro">Rio de Janeiro</option>
                  </select>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputdata">Check-in</label>
                    <input type="date" class="form-control" placeholder="Data de entrada" name="checkin">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputdata">Check-out</label>
                    <input type="date" class="form-control" placeholder="Data de saída" name="checkout">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputadutos">Adultos</label>
                    <input type="number" class="form-control" placeholder="0" name="qtdAdultos" min="0" max="10">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputadutos">Crianças</label>
                    <input type="number" class="form-control" placeholder="0" name="qtdCriancas" min="0" max="10">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputadutos">Quartos</label>
                    <input type="number" class="form-control" placeholder="0" name="qtQuartos" min="0" max="10">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Sobrenome" name="sobreNome">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" placeholder="Confirmar endereço de Email" name="confirmarEmail">
                </div>
                <div class="form-group">
                  <label>Meios de pagamento</label>
                  <select class="form-control" name="meioPgto">
                    <option value="">Selecionar</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Cartão de crédito">Cartão de crédito</option>
                    <option value="Transferência bancária">Transferência bancária</option>
                  </select>
                </div>
                <button class="big fluid ui blue button" name="submit">Solicitar reserva</button>
                <button class="big fluid ui blue loading disabled button" name="loading"style="display: none;">Carregando...</button>
              </form>
            </div>
          </div>
<!--           <div class="row justify-content-center">
            <div class="col-md-10">
              <div id="map" class="bg-white"></div>
            </div>
          </div> -->
        </div>
      </section>
    </div>
  </div>
  <script src="js/reservar.js"></script>
  <script>
    $("a[name=logout]").click(function(){
      SwAlertConfirm.fire({
        text: "Deseja sair do sistema?"
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
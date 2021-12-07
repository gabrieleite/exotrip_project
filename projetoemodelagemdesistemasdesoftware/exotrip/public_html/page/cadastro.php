<!DOCTYPE html>
<html lang="en">
<head>
  <title>exotrip</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/style_login.css">

  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_login.css">

</head>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URL;?>">exotrip</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="<?php echo URL;?>" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="<?php echo URL;?>" class="nav-link">Benefícios</a></li>
        <li class="nav-item"><a href="<?php echo URL;?>" class="nav-link">Pacotes</a></li>
        <li class="nav-item"><a href="<?php echo URL;?>" class="nav-link">Sobre nós</a></li>
        
        <li class="nav-item active"><a href="#login" class="nav-link">Login</a></li>
        <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
      </ul>
    </div>
  </div>
</nav>

<body>
  <section class="ftco-section ftco-agent ftco-no-pt" id="login">
    <div class="container">
      <div class="row justify-content-center pb-5"></div>
      <div class="limiter">
        <div class="container-login100">
          <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
              <img src="images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form">
              <span class="login100-form-title">
                Cadastrar 
              </span>

              <div class="wrap-input100 validate-input" >
                <input class="input100" type="text" name="nome" placeholder="Nome">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </span>
              </div>
              <div class="wrap-input100 validate-input" data-validate="Insira um e-mail válido: ex@abc.xyz">
                <input class="input100" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Insira uma senha">
                <input class="input100" type="password" name="senha" placeholder="Senha">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>

              <div class="wrap-input100 validate-input" data-validate="Confirme a senha">
                <input class="input100" type="password" name="confirmarSenha" placeholder="Confirmar senha">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
              </div>              

              <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                  Cadastrar
                </button>
              </div>

            <div class="text-center p-t-136">
              <a class="txt2" href="<?php echo URL;?>/login">
                Já possui cadastro? Faça o login 
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
              </a>
            </div>
            </form>
          </div>
      </div>
    </div>
  </section>
    

    <!-- footer ----------------------------------------------------------------------------->
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">exotrip</h2>
              <p>Pacotes com preços incríveis para lugares mais incríveis ainda!</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate">
                  <a href="#">
                    <span class="icon-twitter">
                    </span>
                  </a>
                </li>
                  <li class="ftco-animate">
                    <a href="#">
                    <span class="icon-facebook">
                  </span>
                </a>
                </li>
                  <li class="ftco-animate">
                    <a href="#">
                    <span class="icon-instagram">
                  </span>
                </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Tópicos</h2>
              <ul class="list-unstyled">
                <li>
                  <a href="<?php echo URL;?>">
                    <span class="icon-long-arrow-right mr-2">
                    </span>Benefícios</a>
                  </li>
                <li>
                  <a href="<?php echo URL;?>">
                    <span class="icon-long-arrow-right mr-2">
                    </span>Pacotes</a>
                  </li>
                <li>
                  <a href="<?php echo URL;?>">
                    <span class="icon-long-arrow-right mr-2">
                    </span>Sobre nós</a>
                  </li>
                <li>
                  <a href="<?php echo URL;?>/login">
                    <span class="icon-long-arrow-right mr-2">
                    </span>Login</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Compre conosco</h2>
              <ul class="list-unstyled">
                <li>
                  <a href="<?php echo URL;?>">
                    <span class="icon-long-arrow-right mr-2">
                  </span>Mais vendidos
                </a>
                </li>
                <li>
                  <a href="<?php echo URL;?>/login">
                    <span class="icon-long-arrow-right mr-2">
                    </span>Login
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Algo mais?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li>
                    <span class="icon icon-map-marker"></span>
                    <span class="text">Rua São Paulo, 3421 - São Paulo - SP</span>
                  </li>
                  <li>
                    <a href="#">
                      <span class="icon icon-phone"></span>
                      <span class="text">(11)95687-5241</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="icon icon-envelope pr-4"></span>
                      <span class="text">info@exotrip.com</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> Todos os direitos reservados</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>



    <!-- loader -->
<!--     <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> -->


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

    <script src="js/main_login.js"></script>
    <script src="js/cadastro.js"></script>

</body>

</html>
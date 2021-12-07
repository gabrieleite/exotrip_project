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
        
        <li class="nav-item active"><a href="<?php echo URL;?>/login" class="nav-link">Login</a></li>
        <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
  <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
      </ul>
    </div>
  </div>
</nav>

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
          	Entrar 
          </span>

          <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
          		<i class="fa fa-envelope" aria-hidden="true"></i>
          	</span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="senha" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
          		<i class="fa fa-lock" aria-hidden="true"></i>
          	</span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn">
          		Login
          	</button>
          </div>

<!--           <div class="text-center p-t-12">
            </span>
            <a class="txt2" href="#">
                Esqueceu o nome de usuário/Senha?
          	</a>
          </div> -->

          <div class="text-center p-t-136">
            <a class="txt2" href="<?php echo URL;?>/cadastro">
              Crie sua conta 
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
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Tópicos</h2>
          <ul class="list-unstyled">
            <li><a href="index.html"><span class="icon-long-arrow-right mr-2"></span>Benefícios</a></li>
            <li><a href="index.html"><span class="icon-long-arrow-right mr-2"></span>Pacotes</a></li>
            <li><a href="index.html"><span class="icon-long-arrow-right mr-2"></span>Sobre nós</a></li>
            <li><a href="login.html"><span class="icon-long-arrow-right mr-2"></span>Login</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Compre conosco</h2>
          <ul class="list-unstyled">
            <li><a href="index.html"><span class="icon-long-arrow-right mr-2"></span>Mais vendidos</a></li>
            <li><a href="login.html"><span class="icon-long-arrow-right mr-2"></span>Login</a></li>
          </ul>
        </div>
      </div>

      <div class="col-md">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Algo mais?</h2>
          <div class="block-23 mb-3">
            <ul>
                <li><span class="icon icon-map-marker"></span><span class="text">Rua São Paulo, 3421 - São Paulo - SP</span></li>
                <li><a href="#"><span class="icon icon-phone"></span><span class="text">(11)95687-5241</span></a></li>
                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@exotrip.com</span></a></li>
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
<link rel="stylesheet" type="text/css" href="css/style_login.css">
<script src="js/main_login.js"></script>
<script src="js/login.js"></script>
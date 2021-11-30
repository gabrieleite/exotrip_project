<!DOCTYPE html>
<head>

</head>
<body>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="robots" content="<?php echo Seo::getRobots();?>" />
    <meta name="googlebot" content="<?php echo Seo::getRobots();?>" />
    <meta name="author" content="Dk3 Internet">
    <title><?php echo Seo::getTitle();?></title>
    <meta property="og:title" content="<?php echo Seo::getTitle();?>">
    <meta name="twitter:title" content="<?php echo Seo::getTitle();?>">
    <meta name="description" content="<?php echo Seo::getDescription();?>">
    <meta property="og:description" content="<?php echo Seo::getDescription();?>">
    <meta name="twitter:description" content="<?php echo Seo::getDescription();?>">
    <meta name="keywords" content="<?php echo Seo::getKeywords();?>">
    <meta property="og:image" content="<?php echo URL.Seo::getImage();?>">
    <meta name="twitter:image" content="<?php echo URL.Seo::getImage();?>">
    <meta name="twitter:card" content="summary">
    <meta property="og:url" content="<?php printf('%s%s', URL, (!empty(page::$url) ? "/".page::$url : null));?>"/>
    <meta name="twitter:url" content="<?php printf('%s%s', URL, (!empty(page::$url) ? "/".page::$url : null));?>">
    <meta property="og:site_name" content="<?php echo Seo::getName();?>"/>
    <link href="<?php echo(URL);?>/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo(URL);?>/favicon.ico">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

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
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="js/sw-mixin.js"></script>
  </head>
  <body>
    
  <?php if(!$hideHeaderFooter) : ?>

  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="/">exotrip</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="<?php echo URL;?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#beneficios" class="nav-link">Benefícios</a></li>
          <li class="nav-item"><a href="#pacotes" class="nav-link">Pacotes</a></li>
          <li class="nav-item"><a href="#sobre" class="nav-link">Sobre nós</a></li>
          
          <li class="nav-item"><a href="login" class="nav-link">Login</a></li>
          <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>-->
        </ul>
      </div>
    </div>
  </nav>

  <?php endif; ?>
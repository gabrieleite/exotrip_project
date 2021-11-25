<?php
require '../lib/autoload.php';
error_reporting(0);

//url base
define(URL, Url::get());

//paginas
Page::set($_GET['url']);

// oculta cabeçalho e rodapé do site
$hideHeaderFooter = in_array(page::$page, ['login', 'cadastro']) ? true : false;

//SEO da pagina
Seo::set(Page::$page);

//buffer de saida
ob_start();

//inclui pagina
include_once(Page::getpage());

//armazena pagina
$body = str_replace(['[URL]'], [URL], ob_get_contents());
define(BODY, $body);

//fecha buffer
ob_end_clean();

//header
include_once 'include/header.php';

//content
echo BODY;

//footer
include_once 'include/footer.php';
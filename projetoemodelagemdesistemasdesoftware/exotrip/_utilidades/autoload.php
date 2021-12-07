<?php
function my_autoload($class)
{
	//diretorio lib
	$lib = ((strpos($_SERVER['HTTP_HOST'], 'exotrip.orgfree.com') !== false) ? '/home/exotrip/lib/' : 'C:/wamp64/www/faculdade/projetoemodelagemdesistemasdesoftware/exotrip/lib/');

	//substitui contra-barra por barra
	$class = str_replace('\\', '/', $class);

	//diretorio raiz
	if(!strpos($class, '/'))
	{
		$dir = $lib;
		$name = $class;
	}
	//sub diretorio
	if(strpos($class, '/'))
	{
		$exp = explode('/', $class);
		$name = end($exp);

		$i=1;
		foreach($exp as $e)
		{
			if($i != count($exp))
			{
				$dir.= $e.'/';
			}
			$i++;
		}
		$dir = sprintf('%s%s', $lib, $dir);
	}

	if(@$opendir = opendir($dir))
	{
		while(($file = readdir($opendir)) !== false)
		{
			if(strpos($file, '.class.php'))
			{
				$classes[] = str_replace('.class.php', null, $file);
			}
		}
		// var_dump($dir, $classes);
		if(in_array($name, $classes))
		{
			require sprintf('%s%s.class.php', $dir, $name);
		}
		if(!in_array($name, $classes))
		{
			die(utf8_decode(sprintf('A classe <u>%s</u> não existe no diretório <b>%s</b>', $name, $dir)));
		}
	}
	else
	{
		die(utf8_decode(sprintf('O diretório <b>%s</b> não existe.<br>File: <u>%s</u>', $dir, $name)));
	}
}
spl_autoload_register('my_autoload');
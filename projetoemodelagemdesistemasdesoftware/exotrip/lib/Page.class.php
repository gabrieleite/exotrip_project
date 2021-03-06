<?php
/**
 * [armazena e gera paginas]
 *
 * @version 1.0 <2017-04-03>
 * 
 * @author Victor Meloque
 * 
 */
class Page
{
	/**
	 * [url completa]
	 * @var string
	 * @since 1.0
	 */
	static public $url = null;

	/**
	 * [pagina atual]
	 * @var string
	 * @since 1.0
	 */
	static public $page = null;

	/**
	 * [parametros da URL]
	 * @var array
	 * @since 1.0
	 */
	static public $params = array();

	/**
	 * [primeiro parametro (quando existir)]
	 * @var [mixed]
	 * @since 1.0
	 */
	static public $firstparam;

	/**
	 * [diretorio das paginas]
	 * @var string
	 * @since 1.0
	 */
	static private $dir = 'page/';

	/**
	 * [página inicial]
	 * @var string
	 * @since 1.0
	 */
	static private $homepage = 'index.php';

	/**
	 * [página de erro para quando nao existir a página solicitada]
	 * @var string
	 * @since 1.0
	 */
	static private $errorpage = 'error.html';

	/**
	 * [paginas do site]
	 * @var array
	 * @since 1.0
	 */
	static private $pages = array();

	/**
	 * [extensoes das paginas]
	 * @var array
	 * @since 1.0
	 */
	static private $extensions = array();

	/**
	 * [recupera/armazena paginas]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses page::setpages()
	 * @uses page::url
	 * @uses page::params
	 * @uses page::page
	 * 
	 * @param [string] $get [url]
	 * @return [void]
	 */
	static public function set($get)
	{
		self::setpages();
	
		if(!empty($get))
		{
			//set url
			self::$url = trim($get);

			//separa url
			self::$params = explode('/', self::$url);
			
			//page
			if(!empty(self::$params[0]))
			{
				self::$page = self::$params[0];
			}

			//params
			if(count(self::$params) > 0){

				//remove page
				array_shift(self::$params);

				//retira indices vazios
				// self::$params = array_filter(self::$params);

				//primeiro parametro
				self::$firstparam = self::$params[0];

				//verifica paginas single
				self::singlepage();
			}
		}
	}

	/**
	 * [valida se a pagina e verdadeira]
	 *
	 * @access private
	 * @since 1.0
	 *
	 * @uses page::page
	 * @uses page::pages
	 * 
	 * @return boolean
	 */
	static private function ispage()
	{
		return in_array(self::$page, self::$pages);
	}

	/**
	 * [retorna pagina que sera exibida]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses page::page
	 * @uses page::ispage()
	 * 
	 * @return string
	 */
	static public function getpage()
	{
		if(empty(self::$page))
		{
			return sprintf('%s%s', self::$dir, self::$homepage);
		}
		if(!self::ispage())
		{
			return sprintf('%s%s', self::$dir, self::$errorpage);
		}
		return sprintf('%s%s.%s', self::$dir, self::$page, self::$extensions[self::$page]);
	}

	/**
	 * [le diretorio das paginas]
	 *
	 * @access private
	 * @since 1.0
	 *
	 * @uses page::dir
	 * @uses page::extension()
	 * @uses page::pages
	 * @uses page::extensions
	 *
	 * @return void
	 */
	static private function setpages()
	{
		if(is_dir(self::$dir))
		{
			//retira "." e ".."
			$a = array_values(array_diff(scandir(self::$dir), array('.','..')));

			//extensao
			array_walk($a, array(get_class(), 'extension'));

			//add arrays
			foreach($a as $fl)
			{
				//arquivo e extensao
				list($file, $extension) = $fl;

				//diretorio do arquivo
				$fileDir = sprintf('%s%s%s', self::$dir, $file, (!empty($extension) ? ".{$extension}" : null));

				//add apenas arquivos
				if(!is_dir($fileDir)){
					self::$pages[] = $file;
					self::$extensions[$file] = $extension;
				}
			}
		}
	}

	/**
	 * [separa extensao do nome do arquivo]
	 *
	 * @access private
	 * @since 1.0
	 * 
	 * @param [string] $f [nome do arquivo]
	 * @return array
	 */
	static private function extension(&$f)
	{
		$pos = strripos($f, '.');
		$f = array(
			substr($f, 0, $pos),
			substr($f, ($pos+1), strlen($f))
		);
	}

	/**
	 * [verifica se é uma pagina single]
	 *
	 * @access private
	 * @since 1.0
	 *
	 * @uses page::page
	 * @uses page::params
	 * 
	 * @return [void]
	 */
	static private function singlepage()
	{
		if(!empty(self::$params))
		{
			if(empty(self::$params[1]))
			{
				self::$page = self::$page.'.single';
			}
			else
			{
				self::$page = self::$page.'.'.self::$params[1];
			}
		}
	}
}
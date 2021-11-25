<?php
class Seo{

	/**
	 * [nome do site]
	 * @var string
	 * @since 1.0
	 */
	static private $name = 'exotrip';

	/**
	 * [titulo da pagina (default)]
	 * @var string
	 * @since 1.0
	 */
	static private $title = 'Home';

	/**
	 * [descricao da pagina (default)]
	 * @var string
	 * @since 1.0
	 */
	static private $description = 'Descrição teste';

	/**
	 * [palavras-chaves (default)]
	 * @var string
	 * @since 1.0
	 */
	static private $keywords = 'testando';

	/**
	 * [imagem para rede-sociais]
	 * @var string
	 * @since 1.0
	 */
	static private $image = '/images/logo-redes-sociais.jpg';

	/**
	 * [robots da pagina]
	 * @var boolean
	 * @since 2.0
	 */
	static private $robots = true;

	/**
	 * [define configuracoes]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::title
	 * @uses seo::keywords
	 *
	 * @param [string] $page [pagina atual]
	 * 
	 * @return void
	 */
	static public function set($page)
	{
		if($page == '')
		{
			self::$title = sprintf('exotrip | %s', self::$title);
			self::$keywords = 'teste, site teste';
		}		
		//...
	}

	/**
	 * [recupera nome do site]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::$name
	 * 
	 * @return [string]
	 */
	static public function getName()
	{
		return self::$name;
	}

	/**
	 * [recupera titulo da pagina]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::$title
	 * 
	 * @return [string]
	 */
	static public function getTitle()
	{
		return self::$title;
	}

	/**
	 * [recupera descricao da pagina]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::$description
	 * 
	 * @return [string]
	 */
	static public function getDescription()
	{
		return self::$description;
	}

	/**
	 * [recupera palavras-chaves da pagina]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::$keywords
	 * 
	 * @return [string]
	 */
	static public function getKeywords()
	{
		return self::$keywords;
	}

	/**
	 * [recupera imagem para rede-sociais do site]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses seo::$image
	 * 
	 * @return [string]
	 */
	static public function getImage()
	{
		return self::$image;
	}

	/**
	 * [define valor robots]
	 *
	 * @access public
	 * @since 2.0
	 *
	 * @uses seo::$robots
	 * 
	 * @param [boolean] $content [novo valor]
	 *
	 * @return [void]
	 */
	static public function setRobots($content)
	{
		self::$robots = $content;
	}

	/**
	 * [recupera valor robots]
	 *
	 * @access public
	 * @since 2.0
	 *
	 * @uses seo::$robots
	 * 
	 * @return [string] [valor html do robots]
	 */
	static public function getRobots()
	{
		if(self::$robots)
		{
			return 'index,follow';
		}
		return 'noindex,nofollow';
	}
}
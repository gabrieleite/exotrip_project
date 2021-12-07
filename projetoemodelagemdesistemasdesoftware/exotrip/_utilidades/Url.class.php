<?php
class Url
{
	/**
	 * [get recupera url baseado no servidor que está (on/local)]
	 *
	 * @access public
	 * @version 1.0
	 * 
	 * @param [string] $type [define qual url sera chamada]
	 * 
	 * @return [string]
	 */
	static public function get($type = null)
	{
		switch($type)
		{
			// case 'login' : return self::getlogin(); break;
			default : return self::getdefault(); break;
		}
	}

	/**
	 * [getdefault recupera url principal]
	 *
	 * @access private
	 * @version 1.0
	 *
	 * @uses server::on()
	 * 
	 * @return [string]
	 */
	static private function getdefault()
	{
		if(Server::on())
		{
			$url = 'http://www.exotrip.orgfree.com';
		}
		if(!Server::on())
		{
			$url = 'http://127.0.0.1/faculdade/projetoemodelagemdesistemasdesoftware/exotrip/public_html';
		}
		return $url;
	}

	// /**
	//  * [getlogin recupera url da página login]
	//  *
	//  * @access private
	//  * @version 1.0
	//  *
	//  * @uses server::on()
	//  * 
	//  * @return [string]
	//  */
	// static private function getlogin()
	// {
	// 	if(server::on())
	// 	{
	// 		$url = 'http://login.exemplo.com.br';
	// 	}
	// 	if(!server::on())
	// 	{
	// 		$url = 'http://192.168.30.245:84/projetos/_novoprojeto/login';
	// 	}
	// 	return $url;
	// }
}
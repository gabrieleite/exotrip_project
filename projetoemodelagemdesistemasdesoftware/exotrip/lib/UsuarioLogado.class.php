<?php
class UsuarioLogado {

	static private $sessaoprefixo = 'et';
	static private $sessaooperadorsistema = 'us';
	static private $cookieprefixo = 'et';
	static private $cookieseguranca = '210915';
	static private $cookiepath = '/';
	static private $Conexao;

	static private $idUsuario;
	static private $nome;
	static private $email;
	static private $senha;

	static private $error;

	static public function getConexao(){
	  return self::$Conexao;
	}
	static public function setConexao($Conexao){
	  self::$Conexao = $Conexao;
	}	

	static public function getIdUsuario(){
	  return self::$idUsuario;
	}
	static public function setIdUsuario($idUsuario){
	  self::$idUsuario = $idUsuario;
	}
	
	static public function getNome(){
	  return self::$nome;
	}
	static public function setNome($nome){
	  self::$nome = $nome;
	}

	static public function getEmail(){
	  return self::$email;
	}
	static public function setEmail($email){
	  self::$email = $email;
	}

	static public function getSenha(){
	  return self::$senha;
	}
	static public function setSenha($senha){
	  self::$senha = $senha;
	}

	static public function getError(){
	  return self::$error;
	}
	static public function setError($error){
	  self::$error = $error;
	}
			
	/**
	 * [logar Faz login do usuário]
	 * @param  [string] $email [E-mail]
	 * @param  [string] $senha [Senha]
	 * @return [bool]
	 */
	static public function logar($email, $senha){

		self::setEmail(trim($email));
		self::setSenha(trim($senha));

		if(self::validar()){

			self::setsession();
			self::setsecuritycookie();
			return true;
		}
		return false;
	}

	/**
	 * [setsession Cria sessão do usuário]
	 * @return [void]
	 */
	static private function setsession(){
		if(!isset($_SESSION)){
			if(Server::on()){
				ini_set('session.cookie_domain', '.exotrip.com.br');
			}
			session_start();
		}
		$_SESSION[self::$sessaoprefixo.self::$sessaooperadorsistema] = (int)self::getIdUsuario();
	}

	/**
	 * [getsession Recupera sessão]
	 * @return [bool]
	 */
	static private function getsession(){
		
		if(!isset($_SESSION)){
			if(Server::on()){
				ini_set('session.cookie_domain', '.exotrip.com.br');
			}
			session_start();
		}
		if(isset($_SESSION[self::$sessaoprefixo.self::$sessaooperadorsistema]) && !empty($_SESSION[self::$sessaoprefixo.self::$sessaooperadorsistema])){
			self::setIdUsuario($_SESSION[self::$sessaoprefixo.self::$sessaooperadorsistema]);
			return true;
		}
		return false;
	}

	/**
	 * [setsecuritycookie Cria cookie de segurança]
	 * @return [void]
	 */
	static private function setsecuritycookie(){
		$valor = sha1(implode('#', array(self::getIdUsuario(), $_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'])));
		setcookie(self::$cookieprefixo.self::$cookieseguranca, $valor, 0, self::$cookiepath);
	}

	/**
	 * [deslogar Desloga usuário]
	 * @return [bool]
	 */
	static public function deslogar(){

		if(!self::getsession()){
			return false;
		}

		foreach($_SESSION as $key => $value){
			if(substr($key, 0, strlen(self::$sessaoprefixo)) == self::$sessaoprefixo){
				unset($_SESSION[$key]);
			}
		}

		if(count($_SESSION) == 0){				
			session_destroy();			
			if(isset($_COOKIE['PHPSESSID'])){
				setcookie('PHPSESSID', false, (time() - 3600));
				unset($_COOKIE['PHPSESSID']);
			}
		}

		if(isset($_COOKIE[self::$cookieprefixo.self::$cookieseguranca])){
			setcookie(self::$cookieprefixo.self::$cookieseguranca, false, (time() - 3600), self::$cookiepath);
			unset($_COOKIE[self::$cookieprefixo.self::$cookieseguranca]);
		}

		return true;
	}

	/**
	 * [get Recupera dados do usuário]
	 * @return [bool]
	 */
	static public function get(){

		$conn = new Mysql_i;

		try {
		
			if(!$conn->conectar()){
				throw new Exception($conn->getError());
			}

			if(!self::getsession()){
				throw new Exception('Usuário não localizado');
			}

			$query = sprintf("SELECT id_usuario, nome, email FROM usuario WHERE BINARY id_usuario = %d", $conn->escape(self::getIdUsuario()));
			$result = $conn->query($query);

			if($result->num_rows <= 0){
				throw new Exception('Usuário não localizado');
			}

			$row = mysqli_fetch_assoc($result);
			mysqli_free_result($result);

			self::setIdUsuario($row["id_usuario"]);
			self::setNome($row["nome"]);
			self::setEmail($row["email"]);

			return true;

		} catch (Exception $e) {
			self::setError($e->getMessage());
			return false;
		}
	}

	/**
	 * [validar Valida o login]
	 * @return [bool]
	 */
	static private function validar(){

		$conn = new Mysql_i;

		try {
		
			if(!$conn->conectar()){
				throw new Exception($conn->getError());
			}

			$query = sprintf("SELECT id_usuario, senha FROM usuario WHERE BINARY email = '%s' AND ativo = 'T' LIMIT 1", $conn->escape(self::getEmail()));
			$result = $conn->query($query);

			if($result->num_rows <= 0){
				throw new Exception('O usuário não existe ou está desativado');
			}

			$row = mysqli_fetch_assoc($result);
			mysqli_free_result($result);

			if(!Bcrypt::check(self::getSenha(), $row['senha'])){
				throw new Exception('Usuário ou senha inválidos');
			}
			
			self::setIdUsuario($row['id_usuario']);
			return true;

		} catch (Exception $e) {
			self::setError($e->getMessage());
			return false;
		}
	}
}
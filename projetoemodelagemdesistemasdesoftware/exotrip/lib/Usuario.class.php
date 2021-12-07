<?php
class Usuario{

	private $Conexao;
	private $mensagemErro;

	private $idUsuario;
	private $dataCadastro;
	private $ativo;
	private $nome;
	private $email;
	private $senha;
	private $timeZone = 'America/Sao_Paulo';
	private $emailAntigo;
	
	public function __construct($id = null){
		$this->setIdUsuario($id);
	}

	public function getConexao(){
	  return $this->Conexao;
	}
	public function setConexao($Conexao){
	  $this->Conexao = $Conexao;
	  return $this;
	}
	
	public function getMensagemErro(){
	  return $this->mensagemErro;
	}
	public function setMensagemErro($mensagemErro){
	  $this->mensagemErro = $mensagemErro;
	  return $this;
	}

	public function getIdUsuario(){
	  return $this->idUsuario;
	}
	public function setIdUsuario($idUsuario){
	  $this->idUsuario = $idUsuario;
	  return $this;
	}
	
	public function getDataCadastro(){
	  return $this->dataCadastro;
	}
	public function setDataCadastro($dataCadastro){
	  $this->dataCadastro = $dataCadastro;
	  return $this;
	}
	
	public function getAtivo(){
	  return $this->ativo;
	}
	public function setAtivo($ativo){
	  $this->ativo = $ativo;
	  return $this;
	}
	
	public function getNome(){
	  return $this->nome;
	}
	public function setNome($nome){
	  $this->nome = $nome;
	  return $this;
	}

	public function getEmail(){
	  return $this->email;
	}
	public function setEmail($email){
	  $this->email = $email;
	  return $this;
	}	
	
	public function getSenha(){
	  return $this->senha;
	}
	public function setSenha($senha){
	  $this->senha = $senha;
	  return $this;
	}

	public function getTimeZone(){
	  return $this->timeZone;
	}
	public function setTimeZone($timeZone){
	  $this->timeZone = $timeZone;
	  return $this;
	}

	public function getEmailAntigo(){
	  return $this->emailAntigo;
	}
	public function setEmailAntigo($emailAntigo){
	  $this->emailAntigo = $emailAntigo;
	  return $this;
	}	

	/**
	 * [criar CRUD Insert]
	 * @return [boolean]
	 */
	public function criar(){
		$query = sprintf("INSERT INTO usuario(
												data_cadastro,
												ativo,
												nome,
												email,
												senha
											) VALUES (
												'%s',
												'%s',
												'%s',
												'%s',
												'%s'
											)",
											$this->getConexao()->escape($this->getDataCadastro()),
											$this->getConexao()->escape($this->getAtivo()),
											$this->getConexao()->escape($this->getNome()),
											$this->getConexao()->escape($this->getEmail()),
											$this->getConexao()->escape($this->getSenha())
										);
		try{
			$result = $this->getConexao()->query($query);

			if(!$result){
				throw new Exception($this->getConexao()->getError());
			}
			$this->setIdUsuario($this->getConexao()->getInsertId());
			return true;

		}catch(Exception $e){
			$this->setMensagemErro($e->getMessage());
			return false;
		}
	}
	
	/**
	 * [getr recupera dados do usuario]
	 * @return [boolean]
	 */
	public function get(){
		$query = sprintf("SELECT
												id_usuario,
												data_cadastro,
												ativo,
												nome,
												email,
												senha
											FROM
												usuario
											WHERE
												id_usuario = %d",
												$this->getConexao()->escape($this->getIdUsuario()));
		try{
			$result = $this->getConexao()->query($query);

			if(!$result){
				throw new Exception($this->getConexao()->getError());
			}
				
			if(mysqli_num_rows($result) <= 0){
				throw new Exception("Usuário não econtrado");
			}

			$row = mysqli_fetch_assoc($result);
			$this
				->setIdUsuario($row["id_usuario"])
				->setDataCadastro($row["data_cadastro"])
				->setAtivo($row["ativo"])
				->setNome($row["nome"])
				->setEmail($row["email"])
				->setSenha($row["senha"]);
			mysqli_free_result($result);
			return true;

		}catch(Exception $e){
			$this->setMensagemErro($e->getMessage());
			return false;
		}
	}

	/**
	 * [selecionar CRUD Select]
	 * @param [string] $query [query à acrescentar]
	 * @return [array]
	 */
	public function selecionar($query = null){
		$query = sprintf("SELECT * FROM usuario %s", (!empty($query) ? $query : null));

		try{
			$result = $this->getConexao()->query($query);

			if(!$result){
				throw new Exception($this->getConexao()->getError());
			}
			$data = array();

			if(mysqli_num_rows($result) > 0){
				foreach ($result as $row){
					
					$obj = new Usuario();
					$obj
						->setIdUsuario($row["id_usuario"])
						->setDataCadastro($row["data_cadastro"])
						->setAtivo($row["ativo"])
						->setNome($row["nome"])
						->setEmail($row["email"])
						->setSenha($row["senha"]);
					$data[] = $obj;
				}
				mysqli_free_result($result);
			}
			return $data;

		}catch(Exception $e){
			$this->setMensagemErro($e->getMessage());
			return [];
		}
	}

	/**
	 * [valueFormat Formata o valor a ser inserido/alterado]
	 * @param [mixed] $val [Valor que será formatado]
	 * @return [string]
	 */
	private function valueFormat($val){
		if($val == "NULL"){
			return $val;
		}
		return sprintf("'%s'", $this->getConexao()->escape($val));
	}	

	/**
	 * [alterar CRUD Update]
	 * @return [boolean]
	 */
	public function alterar(){
		$set = array();

		if(!empty($this->getAtivo())){
			$set[] = sprintf("ativo = '%s'", $this->getConexao()->escape($this->getAtivo()));
		}

		if(!empty($this->getNome())){
			$set[] = sprintf("nome = '%s'", $this->getConexao()->escape($this->getNome()));
		}

		if(!empty($this->getEmail())){
			$set[] = sprintf("email = '%s'", $this->getConexao()->escape($this->getEmail()));
		}			

		if(!empty($this->getSenha())){
			$set[] = sprintf("senha = '%s'", $this->getConexao()->escape($this->getSenha()));
		}	

		try{
			if(empty($set)){
				throw new Exception("Não foi possível alterar");
			}

			$query = sprintf("UPDATE usuario SET %s WHERE id_usuario = %d", implode($set, ","), $this->getConexao()->escape($this->getIdUsuario()));
			$result = mysqli_query($this->getConexao()->getLink(), $query);

			if(!$result){
				throw new Exception($this->getConexao()->getError());
			}
			return true;

		}catch(Exception $e){
			$this->setMensagemErro($e->getMessage());
			return false;
		}
	}

	/**
	 * [verificaUsuario verifica se existe algum usuario com a descrição de usuário informada]
	 * @return [boolean]
	 */
	private function verificaUsuario(){

		try {

			// Recupera o usuário pela descrição
			$usuario = new Usuario();
			$usuario->setConexao($this->getConexao());
			$dados = $usuario->selecionar(sprintf("WHERE email = '%s'", $this->getConexao()->escape($this->getEmail())));

			if(count($dados) > 0){
				throw new Exception("Já existe um usuário com esse login");
			}
			
			return true;

		} catch (Exception $e) {
			$this->setMensagemErro($e->getMessage());
			return false;
		}
	}

	/**
	 * [novo Alias do método criar]
	 * @return [boolean]
	 */
	public function novo(){

		try{

			if(!$this->verificaUsuario()){
				throw new Exception($this->getMensagemErro());
			}
			
			$this
				->setDataCadastro((new DateTime("now", new DateTimeZone($this->getTimeZone())))->format("Y-m-d H:i:s"))
				->setAtivo("T");

			return $this->criar();

		}catch (Exception $e) {
			$this->setMensagemErro($e->getMessage());
			return false;
		}
	}


	/**
	 * [modificar Alias do método alterar]
	 * @return [boolean]
	 */
	public function modificar(){

		try {

			if($this->getEmailAntigo() != $this->getUsuario()){
				if(!$this->verificaUsuario()){
					throw new Exception($this->getMensagemErro());
				}
			}

			$this->setAtivo($this->getAtivo() == true ? "T" : "F");

			return $this->alterar();

		}catch (Exception $e) {
			$this->setMensagemErro($e->getMessage());
			return false;
		}		
	}		
}
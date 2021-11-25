<?php
class Mysql_i extends Conexao
{
	/**
	 * [se conecta ao banco de dados]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses mysqli::data()
	 * @uses mysqli::open()
	 * @uses mysqli::dataetl()
	 *
	 * @param [boolean] $etl [conecta-se na base ETL?]
	 * 
	 * @return [boolean]
	 */
	public function conectar($etl = false)
	{
		if(!$etl)
		{
			$this->data();
		}
		if($etl)
		{
			$this->dataetl();
		}
		return $this->open();
	}

	/**
	 * [define quais dados usará para se conectar]
	 *
	 * @access private
	 * @since 1.0
	 *
	 * @uses server::on()
	 * @uses conexao::host
	 * @uses conexao::user
	 * @uses conexao::pass
	 * @uses conexao::banco
	 * 
	 * @return [void]
	 */
	private function data()
	{
		// on
		if(server::on())
		{
			$this->host = '';
			$this->user = '';
			$this->pass = '';
			$this->banco = '';
		}
		// off
		if(!server::on())
		{
			$this->host = 'localhost';
			$this->user = 'root';
			$this->pass = '';
			$this->banco = 'nome_do_banco';
		}
	}

	/**
	 * [define quais dados usará para se conectar]
	 *
	 * @access private
	 * @since 2.0
	 *
	 * @uses server::on()
	 * @uses conexao::host
	 * @uses conexao::user
	 * @uses conexao::pass
	 * @uses conexao::banco
	 * 
	 * @return [void]
	 */
	private function dataetl()
	{
		if(server::on())
		{
			$this->host = '';
			$this->user = '';
			$this->pass = '';
			$this->banco = '';
		}
		if(!server::on())
		{
			$this->host = '';
			$this->user = '';
			$this->pass = '';
			$this->banco = '';
		}
	}

	/**
	 * [abre conexao com banco de dados]
	 *
	 * @access private
	 * @since 1.0
	 *
	 * @uses conexao::link
	 * @uses conexao::host
	 * @uses conexao::user
	 * @uses conexao::pass
	 * @uses conexao::banco
	 * 
	 * @return [boolean]
	 */
	private function open()
	{
		@$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->banco);
		if(!$this->link)
		{
			$this->connecterror = mysqli_connect_error();
			return false;
		}
		return true;
	}

	/**
	 * [fecha conexao com banco de dados]
	 *
	 * @access public
	 * @since 1.0
	 *
	 * @uses conexao::link
	 * 
	 * @return [boolean]
	 */
	public function close()
	{
		return mysqli_close($this->link);
	}
}
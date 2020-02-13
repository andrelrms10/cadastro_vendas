<?php



class ModelVendedor extends model
{

	//Lista todos os vendedores cadastrados
	public function listarTodosVendedores()
	{

		$retorno = array();

		$sql = "SELECT * FROM tb_vendedores";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetchAll();
		}

		return $retorno;
	}


	//Seleciona totos os emails cadastrados
	public function listaDeEmails()
	{
		$retorno = array();

		$sql = "SELECT email FROM tb_vendedores";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetchAll();
		}

		return $retorno;
	}


	//Retorna lista de vendedores por nome
	public function listaPorNome()
	{

		$retorno = array();

		$sql = "SELECT id,nome FROM tb_vendedores";
		$sql = $this->db->query($sql);

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetchAll();
		}

		return $retorno;
	}

	//Retorna os dados de um vendedor pelo id
	public function get($id)
	{

		$array = array();

		$sql = "SELECT * FROM tb_vendedores WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}

	//Retorna apenas o nome de um vendedor pelo id
	public function getNomeVendedor($id)
	{

		$array = array();

		$sql = "SELECT nome FROM tb_vendedores WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}


	//Insere um novo cadastro de vendedor
	public function add($nome, $email)
	{
		if ($this->emailExists($email) == false) {

			$sql = "INSERT INTO tb_vendedores (nome, email) VALUES (:nome, :email)";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->execute();

			return true;
		} else {
			return false;
		}
	}


	//Edita os dados de um vendedor
	public function editar($nome, $email, $id)
	{
		$sql = "UPDATE tb_vendedores SET nome = :nome, email = :email WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	//Verifica se o Email já existe
	private function emailExists($email)
	{
		$sql = "SELECT * FROM tb_vendedores WHERE email = :email";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	//Deleta um vendedor
	public function delete($id)
	{
		$sql = "DELETE FROM tb_vendedores WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}

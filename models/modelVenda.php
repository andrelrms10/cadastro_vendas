<?php


class modelVenda extends model
{


	//Lista todas as vendas relizadas
	public function listarTodasVendas()
	{
		$vendedor = new ModelVendedor();

		$retorno = array();

		$sql = "SELECT v.id_vendedor, v.valor,v.comissao, v.data_venda, s.nome, s.email FROM tb_vendas v INNER JOIN tb_vendedores s ON v.id_vendedor = s.id order by s.nome ";
		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$retorno = $sql->fetchAll();
			foreach ($retorno as $key => $item) {
				$infoVend = $vendedor->getNomeVendedor($item['id_vendedor']);
				$retorno[$key]['nome_vendedor'] = $infoVend['nome'];
			}
		}
		return $retorno;
	}


	//Seleciona todas as vendas reaalizadas no dia
	public function totalVendasPorDia()
	{
		$vendas = array();

		$sql = "SELECT v.id_vendedor,s.nome, s.email, v.comissao, v.valor, v.data_venda 
		FROM tb_vendas v INNER JOIN tb_vendedores s ON v.id_vendedor = s.id WHERE 
		 data_venda BETWEEN concat(CURDATE(),' 00:00:00') AND concat(CURDATE(),' 23:59:59')";

		$sql = $this->db->query($sql);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$vendas = $sql->fetchAll();
		}

		return $vendas;

		var_dump($vendas);
	}


	//Soma todas as vendas reaalizadas no dia
	public function somaVendasDiarias()
	{
		$sql = "SELECT SUM(valor) 
		FROM tb_vendas v INNER JOIN tb_vendedores s ON v.id_vendedor = s.id WHERE 
		 data_venda BETWEEN concat(CURDATE(),' 00:00:00') AND concat(CURDATE(),' 23:59:59')";
		$sql = $this->db->query($sql);

		$sql->execute();
		$sql = $sql->fetchColumn();

		return $sql;
	}


	//Soma todas as comissões geradas no dia
	public function somaComissaoDiaria()
	{

		$sql = "SELECT SUM(comissao) 
		FROM tb_vendas v INNER JOIN tb_vendedores s ON v.id_vendedor = s.id WHERE 
		 data_venda BETWEEN concat(CURDATE(),' 00:00:00') AND concat(CURDATE(),' 23:59:59')";
		$sql = $this->db->query($sql);

		$sql->execute();

		$sql = $sql->fetchColumn();

		return $sql;
	}


	//Retorna lista de vendas realizadas por um vendedor
	public function getFiltroVendedor($id)
	{
		$vendasPorVendedor = array();

		$sql = "SELECT v.id_vendedor, v.comissao, v.valor, v.data_venda, s.nome, s.email FROM tb_vendas v INNER JOIN tb_vendedores s ON v.id_vendedor = s.id WHERE v.id_vendedor = :id ";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$vendasPorVendedor = $sql->fetchAll();
		}

		return $vendasPorVendedor;
	}


	//Insere um novo cadastro de venda
	public function add($id_vendedor, $valor, $comissao)
	{

		$sql = "INSERT INTO tb_vendas (id_vendedor, valor, comissao) VALUES (?,?,?)";
		$sql = $this->db->prepare($sql);
		$sql->bindParam(1, $id_vendedor);
		$sql->bindValue(2, $valor);
		$sql->bindValue(3, $comissao);
		$sql->execute();
	}
}

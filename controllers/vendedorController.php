<?php


class vendedorController extends controller
{

	//Função inicializa os a página carregando os dados
	public function index()
	{
		$dados	= array();

		$vendedor = new modelVendedor();

		$dados['nome'] = $vendedor->listarTodosVendedores();


		$this->loadTemplate('vendedor', $dados);
	}

	//Abre formulário para adicionar Vendedor
	public function adicionar()
	{
		$dados = array(
			'error' => ''
		);

		if (!empty($_GET['error'])) {
			$dados['error'] = $_GET['error'];
		}

		$this->loadTemplate('adicionar_vendedor', $dados);
	}

	//Salva cadastro do vendedor
	public function add_save()
	{
		if (!empty($_POST['email'])) {
			$nome = addslashes($_POST['nome']);
			$email = $_POST['email'];


			$vendedor = new modelVendedor();
			if ($vendedor->add($nome, $email)) {
				header("Location: " . BASE_URL . 'vendedor');
			} else {
				header("Location: " . BASE_URL . 'vendedor/adicionar?error=exist');
			}
		} else {
			header("Location: " . BASE_URL . 'vendedor/adicionar');
		}
	}


	//Edita cadastro de um vendedor
	public function edit($id)
	{
		$dados = array();

		if (!empty($id)) {
			$vendedor = new modelVendedor();

			if (!empty($_POST['nome']) && !empty($_POST['email'])) {

				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);

				$vendedor->editar($nome, $email, $id);
			} else {

				$dados['info'] = $vendedor->get($id);

				if (isset($dados['info']['id'])) {
					$this->loadTemplate('editar', $dados);
					exit;
				}
			}
		}
		header("Location: " . BASE_URL . 'vendedor');
	}

	// Deleta um cadastro de vendedor
	public function del($id)
	{

		if (!empty($id)) {
			$vendedor = new modelVendedor();
			$vendedor->delete($id);
		}

		header("Location: " . BASE_URL . '/vendedor');
	}
}

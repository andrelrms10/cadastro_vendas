<?php


class vendaController extends controller
{

    private $arrayInfo;

    //Função inicializa os a página carregando os dados
    public function index()
    {
        $dados = array();
        $venda = new modelVenda();
        $vendedor = new modelVendedor();


        if (!empty($_POST['id_vendedor']) && $_POST['id_vendedor'] != '') {
            $id = addslashes($_POST['id_vendedor']);
            $dados['id_filtro'] = $id;
            $dados['totalVendas'] = $venda->getFiltroVendedor($id);
        } else {
            $id = [''];
            $dados['id_filtro'] = $id;
            $dados['totalVendas'] = $venda->listarTodasVendas();
        }


        $dados ['listaDeEmails'] = $vendedor->listaDeEmails();
        $dados['listaDeVendedores'] = $vendedor->listaPorNome();

        $this->loadTemplate('venda', $dados);
    }


    //Abre formulário para adicionar Venda
    public function adicionar()
    {

        $vend = new modelVendedor();

        $this->arrayInfo['list_vend'] = $vend->listarTodosVendedores();

        $this->loadTemplate('adicionarVenda', $this->arrayInfo);
    }

    //Função salva um novo cadastro de venda
    public function add_save()
    {
        $pComissao = 8.5;

        if (!empty($_POST['valor'])) {
            $id_vendedor = addslashes($_POST['id_vendedor']);
            $valor = addslashes($_POST['valor']);
            $calculo_comissao = $valor * 0.085;
            $comissao = $this->formatar_moeda($calculo_comissao);
            $comissao = ($valor / 100) * $pComissao;

            $venda = new modelVenda();
            $venda->add($id_vendedor, $valor, $comissao);

            header("Location: " . BASE_URL);
        }
    }

    private function formatar_moeda($valor)
    {
        return str_replace(',', '.', $valor);
    }
}

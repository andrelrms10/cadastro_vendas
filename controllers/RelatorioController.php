<?php

class RelatorioController extends controller
{
    //Função reponsavel por preencher relatorio de vendas diárias
    public function index()
    {
        $dados = array();
        $venda = new modelVenda();

        $dados['somaComissaoDiaria'] = $venda->somaComissaoDiaria();
        $dados['somaVendasDiarias'] = $venda->somaVendasDiarias();
        $dados['totalVendas'] = $venda->totalVendasPorDia();

        $this->loadTemplate('relatorio', $dados);
    }

    public function gerarRelatorio()
    {
        $dados = array();
        $venda = new modelVenda();

        $dados['somaComissaoDiaria'] = $venda->somaComissaoDiaria();
        $dados['somaVendasDiarias'] = $venda->somaVendasDiarias();
        $dados['totalVendas'] = $venda->totalVendasPorDia();

        $this->loadTemplate('vendasDiarias', $dados);
    }

    public function upload()
    {
        $arquivo = $_FILES['arquivo'];

        if (isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {
            
            move_uploaded_file($arquivo['tmp_name'], 'arquivos/relatorio_diario.pdf');

            header('Location: '.BASE_URL.'Email');
        }
    }
}

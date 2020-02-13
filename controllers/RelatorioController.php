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

        var_dump($dados);

        $this->loadTemplate('vendasDiarias', $dados);

        header("Location: " . BASE_URL);
    }
}

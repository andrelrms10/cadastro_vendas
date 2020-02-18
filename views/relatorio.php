<!DOCTYPE html>
<html lang="pt=br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cadastro de Vendas</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="starter-template.css" rel="stylesheet">
</head>

<body>

    <main>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Vendas realizadas hoje ( <?php echo date('d-m-Y'); ?>)</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-hover ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>VENDEDOR</th>
                            <th>EMAIL</th>
                            <th>COMISSÃO</th>
                            <th>VALOR</th>
                            <th>DATA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($totalVendas as $item) : ?>
                            <tr>
                                <td><?php echo $item['id_vendedor']; ?></td>
                                <td><?php echo $item['nome']; ?></td>
                                <td><?php echo $item['email']; ?></td>
                                <td>R$ <?php echo number_format($item['comissao'], 2, ',', '.'); ?></td>
                                <td>R$ <?php echo number_format($item['valor'], 2, ',', '.'); ?></td>
                                <td><?php echo $item['data_venda']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="colspan-4">
                            <td class="grand total"></td>
                            <td class="grand total"></td>
                            <td class="grand total">TOTAL</td>
                            <td class="grand total">R$<?php echo $somaComissaoDiaria; ?></td>
                            <td class="grand total">R$<?php echo $somaVendasDiarias; ?></td>
                            <td class="grand total"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <a href="<?php echo BASE_URL; ?>relatorio/gerarRelatorio"><button type="button" class="btn btn-success ">Gerar Relatório</button></a>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

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

    <form method="POST">
        <div class="input-group mb-3">

        </div>
    </form>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Busca de Vendas Por Vendedor </h1>
                </div>
                <div class="col-md-12">
                    <form class="form-inline my-2 my-lg-0 " method="POST">
                        <div class="input-group mb-3 col-md-12">
                            <select class="custom-select" placeholder="Selecione um vendedor" name="id_vendedor">
                                <option value=""></option>
                                <?php foreach ($listaDeVendedores as $item) : ?>
                                    <option value="<?php echo $item['id']; ?>" <?php echo ($id_filtro == $item['id']) ? 'selected="selected"' : ''; ?>><?php echo $item['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="ml-3 mr-4">
                    <a href="<?php echo BASE_URL; ?>venda/adicionar"><button type="button" class="btn btn-success ml-2 ">Adicionar Venda</button></a>
                    <a href="<?php echo BASE_URL; ?>relatorio/index"><button type="button" class="btn btn-success ">Gerar Relatório</button></a>

                </div>
            </div>
            <div class="email ml-10 mr-2">
                <form class="form-inline my-2 my-lg-0 " method="POST" action="Email/index">
                    <select class="custom-select" placeholder="Selecione um vendedor" name="email">
                        <option value=""></option>
                        <?php foreach ($listaDeEmails as $item) : ?>
                            <option value=""> <?php echo $item['email']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="<?php echo BASE_URL; ?>Email/index"><button type="button" class="btn btn-success ">Enviar Email</button></a>
                </form>
            </div>
        </div>
        </div>
    </header>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Vendas Realizadas</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover ">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Comissão</th>
                    <th>Valor</th>
                    <th>Data</th>
                </tr>
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
            </table>
        </div>
    </div>

    <section id="principal">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </section>

</body>

</html>
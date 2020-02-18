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

    <section id="principal">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Envio de Relatório Por Email</h3>
                    <div class="panel-body">
                        <main>
                            <form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>Relatorio/upload">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="arquivo">
                                    <label class="custom-file-label">Escolher arquivo...</label>
                                    <a href="<?php echo BASE_URL; ?>Relatorio/upload"><button type="submit" class="btn btn-success mt-2 mb-4 ">Anexar PDF</button></a>
                                </div>
                            </form>

                            <form method="POST">

                                <div class="form-group">
                                    <input type="email" class="form-control mt-3" aria-describedby="emailHelp" placeholder="Seu email" name="email">
                                    <a href="<?php echo BASE_URL; ?>Email/enviarEmail"><button type="button" class="btn btn-success mt-2 ">Enviar</button></a>
                                </div>

                            </form>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
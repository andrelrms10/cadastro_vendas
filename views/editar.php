<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de Vendas</title>
    <!-- Principal CSS do Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h3>Editar Vendedor:</h3>
        <form method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" class="form-control" name='nome' value="<?php echo $info['nome']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $info['email']; ?>">
            </div>
            <button type="submit" class="btn btn-dark">Salvar</button>
        </form>
    </div>
    <body>

</html>
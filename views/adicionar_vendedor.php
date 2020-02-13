  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro de Vendas</title>
    <!-- Principal CSS do Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">

  </head>

  <body>
    <?php if ($error == 'exist') : ?>
      <div class="alert alert-warning" role="alert">
        Email já cadastrado em nossa base de dados!
      </div>
    <?php endif; ?>

    <h3>Cadastro Vendedor:</h3>
    <form method="POST" action="<?php echo BASE_URL; ?>vendedor/add_save">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name='nome' required>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" name="email" required>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
    </form>
  </body>

  </html>
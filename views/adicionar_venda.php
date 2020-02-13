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
      <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="../assets/css/style.css" rel="stylesheet">

      <!-- Estilos customizados para esse template -->
      <link href="starter-template.css" rel="stylesheet">
    </head>

    <body>
      <h3>Cadastro Venda:</h3>
      <form method="POST" action="<?php echo BASE_URL; ?>venda/add_save">

        <label class="my-1 mr-2">Selecione o vendedor:</label>
        <select class="custom-select my-1 mr-sm-2" name="id_vendedor">
          <?php foreach ($list_vend as $item) : ?>
            <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
          <?php endforeach; ?>
        </select>

        <div class="form-group">
          <label>Valor (R$):</label>
          <input type="amount" class="form-control" name="valor" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </body>
</html>
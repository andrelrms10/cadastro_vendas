<!DOCTYPE html>
<html lang="pt-br">

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
	<a href="<?php echo BASE_URL; ?>vendedor/adicionar"><button type="button" class="btn btn-success mt-5 mb-5">Adicionar Vendedor</button></a>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Vendedores Cadastrados</h3>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-hover ">
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Ações</th>
				</tr>
				<?php foreach ($nome as $item) : ?>
					<tr>
						<td><?php echo $item['id']; ?></td>
						<td><?php echo $item['nome']; ?></td>
						<td><?php echo $item['email']; ?></td>
						<td>
							<a href="<?php echo BASE_URL; ?>vendedor/edit/<?php echo $item['id']; ?>"><button type="button" class="btn btn-primary btn-sm">Editar</button></a>
							<a href="<?php echo BASE_URL; ?>vendedor/del/<?php echo $item['id']; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>

</body>

</html>
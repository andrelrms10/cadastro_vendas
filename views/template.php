	<!doctype html>
	<html lang="pt-br">

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

		<header>
			<nav class="navbar navbar-expand-md navbar-default">

				<nav class="navbar navbar-expand-md navbar-default">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo BASE_URL; ?>">Vendas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo BASE_URL; ?>vendedor">Vendedores</a>
						</li>
					</ul>
				</nav>
			</nav>
		</header>


		<section>
			<div class="container">
				<?php $this->loadViewInTemplate($viewName, $viewData);   ?>
			</div>
		</section>


		<footer class="footer">
			<div class="container">
				Todos os direitos reservados
			</div>
		</footer>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

		<script src="assets/js/vendor/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</body>

	</html>
<?php
session_start();
if (!isset($_SESSION['usuario']) == true) {
	unset($_SESSION['login']);

	header('Location: login.php');
}

$logado = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>

<head>
	<title>Dashboard - Sistema Imobiliário</title>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Favicon -->
		<link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
		<!-- Icons -->
		<link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
		<link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
		<!-- CSS Files -->
		<link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
	</head>
</head>

<body>

	<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
		<div class="container-fluid">
			<!-- Toggler -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<!-- Brand -->
			<a class="navbar-brand pt-0" href="./index.php">
				<img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
			</a>
			<!-- User -->
			<ul class="nav align-items-center d-md-none">
				<li class="nav-item dropdown">
					<a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="ni ni-bell-55"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="media align-items-center">
							<span class="avatar avatar-sm rounded-circle">
								<img alt="Image placeholder" src="./assets/img/theme/team-1-800x800.jpg
								">
							</span>
						</div>
					</a>

				</li>
			</ul>
			<!-- Collapse -->
			<div class="collapse navbar-collapse" id="sidenav-collapse-main">
				<!-- Collapse header -->
				<div class="navbar-collapse-header d-md-none">
					<div class="row">
						<div class="col-6 collapse-brand">
							<a href="./index.html">
								<img src="./assets/img/brand/blue.png">
							</a>
						</div>
						<div class="col-6 collapse-close">
							<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
								<span></span>
								<span></span>
							</button>
						</div>
					</div>
				</div>
				<!-- Form -->
				<form class="mt-4 mb-3 d-md-none">
					<div class="input-group input-group-rounded input-group-merge">
						<input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
						<div class="input-group-prepend">
							<div class="input-group-text">
								<span class="fa fa-search"></span>
							</div>
						</div>
					</div>
				</form>
				<!-- Navigation -->
				<ul class="navbar-nav">
					<a class=" nav-link active " href=" ./index.php">
						<i class="ni ni-chart-bar-32 text-dark"></i>
						Página Inicial
					</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="listarImovel.php">
							<i class="ni ni-building text-dark"></i>
							Imóveis Cadastrados
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="formularioImovel.php">
							<i class="ni ni-fat-add text-dark"></i>
							Novo Imóvel
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="formularioUsuario.php">
							<i class="ni ni-fat-add text-dark"></i>
							Novo Usuário
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="formularioCliente.php">
							<i class="ni ni-fat-add text-dark"></i>
							Novo Cliente
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="formularioCategoria.php">
							<i class="ni ni-chart-bar-32 text-dark"></i>
							Categoria do Imóvel
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link " href="formularioModalidade.php">
							<i class="ni ni-like-2 text-dark"></i>
							Modalidade do Imóvel
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="formularioPagamento.php">
							<i class="ni ni-cart text-dark"></i>
							Formas de Pagamento
						</a>
					</li>
				</ul>

			</div>
		</div>
	</nav>
	<div class="main-content">
		<!-- Navbar -->
		<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
			<div class="container-fluid">
				<!-- Brand -->
				<a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.php">Dashboard</a>
				<!-- Form -->
				<!-- User -->
				<ul class="navbar-nav align-items-center d-none d-md-flex">
					<li class="nav-item dropdown">
						<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="media align-items-center">
								<span class="avatar avatar-sm rounded-circle">
									<img alt="Image placeholder" src="./assets/img/theme/usuario-de-perfil.png">
								</span>
								<div class="media-body ml-2 d-none d-lg-block">
									<?php
									include 'conexao/conexao.php';
									$sql = "SELECT * FROM usuario ";
									$result = mysqli_query($conexao, $sql);
									$dados = mysqli_fetch_array($result);
									$nome = $dados['usuario'];
									?>
									<span class="mb-0 text-sm  font-weight-bold"> <?php echo $nome ?> </span>
								</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
							<div class=" dropdown-header noti-title">
								<h6 class="text-overflow m-0">Bem vindo!</h6>
							</div>

							<div class="dropdown-divider"></div>
							<a href="logout.php" class="dropdown-item">
								<i class="ni ni-user-run"></i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
			</div>
		</nav>
		<!-- Header -->
		<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
			<div class="container-fluid">
				<div class="header-body">
					<!-- Card stats -->
					<br>
					<div class="row">
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Qtd Imóveis</h5>
											<?php
											include 'conexao/conexao.php';
											$sql = 'SELECT COUNT(id_imovel) as quantidade FROM imovel';
											$result = mysqli_query($conexao, $sql);
											$dados = mysqli_fetch_array($result);
											$quantidade = $dados['quantidade'];
											?>
											<span class="h2 font-weight-bold mb-0"> <?php echo $quantidade ?> </span>
											<span><br></span>
											<span><br></span>
											<span><br></span>

										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">

									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Imóveis Vendidos</h5>
											<?php
											include 'conexao/conexao.php';
											$sql = "SELECT COUNT(id_status) as quantidade FROM status_imovel WHERE status_imovel = 'Venda'";
											$result = mysqli_query($conexao, $sql);
											$dados = mysqli_fetch_array($result);
											$qtdVendas = $dados['quantidade'];
											?>
											<span class="h2 font-weight-bold mb-0"><?php echo $qtdVendas ?></span>

										</div>

									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<?php
										include 'conexao/conexao.php';
										$sql = "SELECT * FROM status_imovel WHERE status_imovel = 'Venda'";
										$result = mysqli_query($conexao, $sql);

										$sql2 = "SELECT * FROM imovel WHERE status_imovel = 'Venda'";
										$result2 = mysqli_query($conexao, $sql2);
										$quantidadeImovel = 0;
										$quantidadeVenda = 0;

										while (($dados = mysqli_fetch_array($result)) && ($dados2 = mysqli_fetch_array($result2))) {
											$valorImovel = $dados2['valor_imovel'];
											$valorVenda = $dados['valor_negocio'];
											$quantidadeImovel = $quantidadeImovel + $valorImovel;
											$quantidadeVenda = $quantidadeVenda + $valorVenda;
										}

										$total = $quantidadeVenda - $quantidadeImovel;

										if ($total < 0) {
										?>
											<span class="text-danger mr-2"><i class="fas fa-arrow-down">
												</i> <?php echo number_format($total, 2, ',', ' ') ?>
											</span>
											<br>
											<span class="text-nowrap">Negativo</span>

										<?php } else { ?>
											<span class="text-success mr-2"><i class="fas fa-arrow-up">
												</i> <?php echo number_format($total, 2, ',', '.')  ?>
											</span>
											<br>
											<span class="text-nowrap">Positivo</span>
										<?php } ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Imóveis Alugados</h5>
											<?php
											include 'conexao/conexao.php';
											$sql = "SELECT COUNT(id_status) as quantidade FROM status_imovel WHERE status_imovel = 'Aluguel'";
											$result = mysqli_query($conexao, $sql);
											$dados = mysqli_fetch_array($result);
											$qtdAluguel = $dados['quantidade'];
											?>
											<span class="h2 font-weight-bold mb-0"><?php echo $qtdAluguel ?></span>
										</div>
									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<?php
										include 'conexao/conexao.php';
										$sql = "SELECT SUM(valor_negocio) as valorTotal FROM status_imovel WHERE status_imovel = 'Aluguel'";
										$result = mysqli_query($conexao, $sql);
										$dados = mysqli_fetch_array($result);

										$comissaoAluguel = $dados['valorTotal'] * 0.15;
										?>
										<span class="text-success mr-2"><i class="fas fa-arrow-up"></i> <?php echo number_format($comissaoAluguel, 2, ',', '.') ?></span>
										<span><br></span>
										<span class="text-nowrap">Lucro</span>
										<span><br></span>
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-6">
							<div class="card card-stats mb-4 mb-xl-0">
								<div class="card-body">
									<div class="row">
										<div class="col">
											<h5 class="card-title text-uppercase text-muted mb-0">Lucro bruto</h5>
											<?php
											$lucroBruto = $comissaoAluguel + $total;
											?>
											<span class="h2 font-weight-bold mb-0"><?php echo number_format($lucroBruto, 2, ',', '.') ?></span>
										</div>

									</div>
									<p class="mt-3 mb-0 text-muted text-sm">
										<?php
										if ($total > 0) { ?>
											<span class="text-success mr-2"><i class="fas fa-arrow-up"></i>Saldo <br> Positivo</span>
										<?php	} else { ?>
											<span class="text-success mr-2"><i class="fas fa-arrow-up"></i>Saldo <br> Negativo</span>
										<?php } ?>

									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



</body>

</html>
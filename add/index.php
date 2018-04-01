<!doctype html>
<?php
	$dbserv = "localhost";
	$dbuser = "crudcompras";
	$dbpass = "ggandreleos26!!";
	$dbname = "crudcompras";
	$dbconn = new mysqli($dbserv, $dbuser, $dbpass, $dbname);
	if($dbconn->connect_error) {
		die("Connection failed: ".$dbconn->connect_error);
	}
?>
<html>
	<head>
		<title>Lista de compras</title>
		<link rel="shortcut icon" href="../style/cart.png" type="image/png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../style/mdl-red-indigo.css">
		<script src="../style/mdl.js"></script>
		<link rel="stylesheet" href="../style/fonts.css" type="text/css">
		<style>
			.center {
				margin: auto;
				width: 100%;
			}
			.mdl-textfield {width: 100%;}
		</style>
	</head>
	<body class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-drawer-button">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="../"><i class="material-icons">arrow_back</i></a>
				</nav>
				<div class="mdl-layout-spacer"></div>
				<span class="mdl-layout__title">Lista de compras</span>
				<div class="mdl-layout-spacer"></div>
			</div>
		</header>
		<main class="mdl-layout__content mdl-grid">
			<div class="mdl-layout-spacer"></div>
			<div class="mdl-cell mdl-cell--4-col">
				<form action="index.php" method="post" class="center">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" id="nombre" name="nombre">
						<label class="mdl-textfield__label" for="nombre">Artículo</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="number" id="cantidad" name="cantidad">
						<label class="mdl-textfield__label" for="cantidad">Cantidad</label>
					</div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="number" id="precio" name="precio">
						<label class="mdl-textfield__label" for="precio">Precio</label>
					</div>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" type="reset">
						<i class="material-icons">clear_all</i>
					</button>
					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect" type="submit" name="add">
						<i class="material-icons">add_shopping_cart</i>
					</button>
				</form>
				<?php
					if(isset($_POST['add'])) {
						$sql = "INSERT INTO compras_articulo(articulo_nombre, articulo_cantidad, articulo_precio) VALUES('".$_POST["nombre"]."', '".$_POST["cantidad"]."', '".$_POST["precio"]."')";
						$result = mysqli_query($dbconn, $sql);
					}
					$dbconn->close();
				?>
			</div>
			<div class="mdl-layout-spacer"></div>
		</main>
	</body>
</html>
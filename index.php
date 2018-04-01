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
	$sql = "SELECT * FROM compras_articulo";
	$result = $dbconn->query($sql);
?>
<html>
	<head>
		<title>Lista de compras</title>
		<link rel="shortcut icon" href="style/cart.png" type="image/png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style/mdl-red-indigo.css">
		<script src="style/mdl.js"></script>
		<link rel="stylesheet" href="style/fonts.css" type="text/css">
	</head>
	<body class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--no-drawer-button">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<div class="mdl-layout-spacer"></div>
				<span class="mdl-layout__title">Lista de compras</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="add/"><i class="material-icons">add_shopping_cart</i></a>
				</nav>
			</div>
		</header>
		<main class="mdl-layout__content mdl-grid">
			<div class="mdl-layout-spacer"></div>
			<ul class="mdl-list">
				<?php
					if($result->num_rows>0) {
						while($row=$result->fetch_assoc()) {
							echo "
								<li class=\"mdl-list__item mdl-list__item--two-line\">
									<span class=\"mdl-list__item-primary-content\">
										<span>".$row["articulo_nombre"]."</span>
										<span class=\"mdl-list__item-sub-title\">".$row["articulo_cantidad"]." x $".number_format($row["articulo_precio"])."</span>
									</span>
									<span class=\"mdl-list__item-secondary-content\">
										<span class=\"mdl-list__item-secondary-action\">
											<form action=\"edit/\" method=\"post\">
												<button class=\"mdl-button mdl-js-button mdl-button--icon mdl-button--accent\" type=\"submit\" name=\"u\" value=\"".$row["articulo_id"]."\">
													<i class=\"material-icons\">edit</i>
												</button>
												<button class=\"mdl-button mdl-js-button mdl-button--icon mdl-button--accent\" type=\"submit\" name=\"d\" value=\"".$row["articulo_id"]."\">
													<i class=\"material-icons\">remove_shopping_cart</i>
												</button>
											</form>
										</span>
									</span>
								</li>
							";
						}
					}
					$dbconn->close();
				?>
			</ul>
			<div class="mdl-layout-spacer"></div>
		</main>
	</body>
</html>
<?php 
session_start(); 
if (isset($_SESSION['IDUsuario'])){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : BarbedFlower 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140322

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Le Cave D'or</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<?php 
	 $con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
	 $registros = mysqli_query($con, "select * from usuarios") or die(mysqli_error($con));
	 $registrosUsuario = mysqli_query($con, "select * from usuarios where id_usuario = '$_SESSION[IDUsuario]'") or die(mysqli_error($con));
	 $registroProducto = mysqli_query($con, "select * from productos where id = '$_REQUEST[producto]'") or die(mysqli_error($con));
	 $registroPedido = mysqli_query($con, "select * from pedido") or die(mysqli_error($con));
?>
<div id="wrapper">
<?php include('menu.php'); ?>

	<div id="banner">
		<div class="container">
			<div class="title">
			<?php
			while($reg = mysqli_fetch_array($registros)){
				$regProducto = mysqli_fetch_array($registroProducto);
				if($_SESSION['IDUsuario'] == $reg['id_usuario']){
					echo "<h2>Hola, ".$reg['nombre']." ".$reg['apellidos']."</h2>";
				}
			}
			?>
				<span class="byline">Compra ahora</span> </div>
			<ul class="actions">

				<!-- <li><a href="#" class="button">Ver catálogo</a></li>-->  </td> <td>

			</ul>
		</div>
		<!-- AQUÍ TECLEA EL CÓDIGO QUE VAYAS A PONER -->
		
		<!-- IMPRIMIR CARRITO -->
		
		<input type="hidden" name="producto" value="<?php echo $_REQUEST['producto']; ?>">
		<input type="hidden" name="cantidad" value="<?php echo $_REQUEST['cantidad']; ?>">
		<input type="hidden" name="pago" value="<?php echo $_REQUEST['pago']; ?>">
		<?php
		
			
		$descuento = 0;
		$precio = ($regProducto['precio'] * $_REQUEST['cantidad']);
		
		if ($_REQUEST['descuento'] == 'paquetealegres'){
			$descuento = ((40 * $precio) / 100);
		}
		else {
			$descuento = 0;
		}
		$precioFinal = ($precio - $descuento);
		?>
		<input type="hidden" name="precioFinal" value="<?php echo $precioFinal; ?>">
		<?php
		if ($_REQUEST['pago'] == "tarjeta"){
		?>
			
			
			<form  action="comprar3.php" method="post">
			<hr>
			<img src='http://lecavedor.esy.es/usuario/images/cards.jpg' border='0' width='200' height='35' align="center"><br><br>
			
				<span class="byline">Importe: <input type="text" name="importe" value="<?php echo $precioFinal?>" size="6"> MXN</span><br><br>
				<span class="byline">Datos de pago con tarjeta de Crédito/Débito</span><br><br>
				<span class="byline">N.º de Tarjeta: </span><input type="text" name="numero" placeholder="XXXX XXXX XXXX XXXX" size="19"><br><br>
				<span class="byline">Vigencia: </span><input type="text" name="vigencia" placeholder="MM/AA" size="3"><br><br>
				<span class="byline">Código de Seguridad/CVV2: </span><input type="text" name="codigo" placeholder="XXX" size="1"><br><br>
				<span class="byline">Titular de la Tarjeta: </span><input type="text" name="titular" placeholder="Nombre(s) Apellido P. Apellido M." size="25"><br><br>
				<span class="byline">Dirección: </span><input type="text" name="direccion" placeholder="Colonia Calle" size="20"><br><br>
				<span class="byline">Ciudad: </span><input type="text" name="ciudad" placeholder="" size="15"><br><br>
				<span class="byline">Provincia: </span><input type="text" name="provincia" placeholder="" size="15"><br><br>
				<span class="byline">Código postal: </span><input type="text" name="postal" placeholder="XXXXX" size="3"><br><br>
			
				<input type="submit" value="Comprar">
			</form>
		<?php	
		}
		else{
			$regProducto = mysqli_fetch_array($registroProducto);
			$regPedido = mysqli_fetch_array($registroPedido);
			$regUsuario = mysqli_fetch_array($registrosUsuario);
			
			mysqli_query($con,"insert into pedido(id_usuario, usuario, precio) values ('$_SESSION[IDUsuario]', '$regUsuario[nickname]', '$precioFinal' )") or die(mysqli_error($con));
		
				if ($_REQUEST['producto'] == '1'){
				mysqli_query($con,"insert into pedido(espumoso1) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));
				}
				elseif ($_REQUEST['producto'] == '2'){
				mysqli_query($con,"insert into pedido(espumoso2) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '3'){
				mysqli_query($con,"insert into pedido(tinto1) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '4'){
				mysqli_query($con,"insert into pedido(tinto2) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '5'){
				mysqli_query($con,"insert into pedido(rosado1) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '6'){
				mysqli_query($con,"insert into pedido(rosado2) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '7'){
				mysqli_query($con,"insert into pedido(blanco1) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '8'){
				mysqli_query($con,"insert into pedido(blanco2) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '9'){
				mysqli_query($con,"insert into pedido(aromatizado1) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				elseif ($_REQUEST['producto'] == '10'){
				mysqli_query($con,"insert into pedido(aromatizado2) values ('$_REQUEST[cantidad]' )") or die(mysqli_error($con));	
				}
				else{
					
				}
		?>
		
		<img src='http://lecavedor.esy.es/usuario/images/pp.png' border='0' width='150' height='30' align="middle"><br><br>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="B9B2PVKRV9TTY">
			<input type="image" src="https://www.paypalobjects.com/es_XC/MX/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal, la forma más segura y rápida de pagar en línea.">
			<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
		</form>

		<?php
		}
		?>
		
		
		<!-- NO PASES DE ETIQUETA DEL RENGLÓN DE ABAJO -->
	</div>
</div>
	<div id="copyright" class="container">
		<p>&copy; Le Cave D'or. Todos los derechos reservados. | Plantilla base por <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
	</div>
</body>
</html>
<?php 
} else {
	header("Location: http://lecavedor.esy.es/?v=5");
}
?>
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
	 $registros = mysqli_query($con, "select * from usuarios where id_usuario = '$_SESSION[IDUsuario]'") or die(mysqli_error($con));
	 $registroProducto = mysqli_query($con, "select * from productos where id = '$_REQUEST[productoElegido]'") or die(mysqli_error($con));
	 $registroPedido = mysqli_query($con, "select * from pedido where id_usuario = '$_SESSION[IDUsuario]'") or die(mysqli_error($con));
?>
<div id="wrapper">
<?php include('menu.php'); ?>

	<div id="banner">
		<div class="container">
			<div class="title">
			<?php
			while($reg = mysqli_fetch_array($registros)){
				
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
		
		<input type="hidden" name="producto" value="<?php echo $_REQUEST['producto']; ?>">
		<input type="hidden" name="cantidad" value="<?php echo $_REQUEST['cantidad']; ?>">
		
		<?php
		
		if ($_REQUEST['pago'] == 'tarjeta'){
			
		
			$regProducto = mysqli_fetch_array($registroProducto);
			$regPedido = mysqli_fetch_array($registroPedido);
			$reg = mysqli_fetch_array($registros);
	
		mysqli_query($con,"insert into pedidos(id_usuario, usuario, precio) values ('$_SESSION[IDUsuario]', '$reg[nickname]', '$_REQUEST[precioFinal]' )") or die(mysqli_error($con));
		
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
		}
		else{
			
		?>
	
	
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
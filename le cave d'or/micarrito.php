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
?>
<div id="wrapper">
<?php include('menu.php'); 
$booleano = false;
$contador=1;
?>

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
</div>
</div>
		<!-- AQUÍ TECLEA EL CÓDIGO QUE VAYAS A PONER -->
		<span class="byline"> Para eliminar un producto de tu carrito, sólo cliquea en su imagen.</span> <br>
<span class="byline"> Para comprar, sólo selecciona el botón de radio, ingresa la cantidad y clic en Listo.</span> <br>
<?php
			include('errores.php');
		?>
		<form action ="comprar.php" method ="post">
		<table width="100%"><tr>
		<?php
		$registros = mysqli_query($con, "select * from carrito") or die(mysqli_error($con));
		while($reg=mysqli_fetch_array($registros)){
if($contador>3){
echo "</tr><tr>";
$contador = 1;
} else {
			if($_SESSION['IDUsuario'] == $reg['id_usuario']){

$booleano = true;
				$registroProducto = mysqli_query($con, "select * from productos where id = '$reg[id_producto]'") or die(mysqli_error($con));
				if($regProducto = mysqli_fetch_array($registroProducto)){
					echo "<td>";
					echo "<td><input type='radio' name='productoElegido' checked value='".$regProducto['id']."'></td>";
					echo "<td><a href='carritoDelete.php?c=".$regProducto['id']."'><img src='http://lecavedor.esy.es/usuario/images/".$regProducto['image'].".png' border='0' width='100' height='300'></a></td><td>Tipo: ".$regProducto['tipo']."<br>Marca: ".$regProducto['marca']."<br>Nombre: ".$regProducto['nombre']."<br>Precio: ".$regProducto['precio']."M/N <br>";
					echo "</td>";
$contador = $contador + 1;
				}

			}
		}
}
if($booleano == false){
echo "<span class='byline'> No se encontraron productos en su carrito.</span><br><br>";
}
		?>
		</tr> </table>
		<input type ="number" name="cantidad" placeholder="Cantidad: " required>
		<input type = "submit" value="LISTO">
		</form>
		<!-- NO PASES DE ETIQUETA DEL RENGLÓN DE ABAJO -->
	</div>
</div>
	<div id="copyright" class="container">
		<p>&copy; Le Cave D'or. Todos los derechos reservados. | Plantilla base por <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
	</div>
</body>
</html>
</html>
<?php 
} else {
	header("Location: http://lecavedor.esy.es/?v=5");
}
<html>
<head>
  <title>Compra</title>
</head>
<body>
<?php
error_reporting(0);


$con = mysqli_connect("localhost","username","password","db") or die("Problemas con la conexion a la base de datos");
	 $registros = mysqli_query($con, "select * from usuarios") or die(mysqli_error($con));
	 //
	 $registros2 = mysqli_query($con, "select * from productos") or die(mysqli_error($con));
	 
	 
	 while($reg = mysqli_fetch_array($registros)){
				//
				$reg2 = mysqli_fetch_array($registros2);
				if($_SESSION['IDUsuario'] == $reg['id_usuario']){
					echo "<h2>Hola, ".$reg['nombre']." ".$reg['apellidos']."</h2>";
				}
			}
?>

<!-- AQUÍ TECLEA EL CÓDIGO QUE VAYAS A PONER -->
		<h1>Compra</h1>
		
		
		<form method="post"  action="compra2.php">
		
		<input type="hidden" name="producto" value="<?php echo $_REQUEST['v']; ?>">
		
		
		<?php 
			$registroInfo=mysqli_query($con,"select * from productos where id = '$_REQUEST[v]'") or die(mysqli_error($con));
			$regI = mysqli_fetch_array($registroInfo);
			echo '<span class="byline"> Nombre: </span>'.  $regI['nombre'].'<br>';
			echo '<span class="byline"> Marca: </span>'.  $regI['marca'].'<br>';
			echo '<span class="byline"> Precio: </span>'.  $regI['precio'].'<br>';
			
			?>
			Ingrese la cantidad que desea <input type="text" name="cantidad" size="5" placeholder="Cantidad" required>
			<br><input type="button" onclick=" location.href='***DIRECCION DE CATALOGO***' " value="Seguir comprando" name="seguir" /> <input type="submit" value="Continuar">
			
			
			<br><hr>
		</form>
			
			
		<!-- NO PASES DE ETIQUETA DEL RENGLÓN DE ABAJO -->

</body>
</html>
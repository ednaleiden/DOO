<?php

include("../conex.php");

if (isset($_GET['save'])) {
	$cantidad = $_GET['cantidad'];
	$producto = $_GET['producto'];

	$query = "INSERT INTO logistica(cantidad,producto) VALUES ('$cantidad','$producto')";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Query failed");
	}


	$_SESSION['message'] = 'Producto creado satisfactoriamente';
	$_SESSION['message_type'] = 'primary';



	header("Location: usuarios_portada.php");
}

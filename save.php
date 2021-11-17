<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$item = $_POST['item'];
		$sabor = $_POST['sabor'];
		$quantidade = $_POST['quantidade'];
		
		$query = "INSERT INTO `pedido` (item, sabor, quantidade) VALUES(:item, :sabor, :quantidade)";
		
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':item', $item);
		$stmt->bindParam(':sabor', $sabor);
		$stmt->bindParam(':quantidade', $quantidade);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>
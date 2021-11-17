<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$pedido_id = $_POST['pedido_id'];
		$item = $_POST['item'];
		$sabor = $_POST['sabor'];
		$quantidade = $_POST['quantidade'];

		$query = "UPDATE `pedido` SET `item` = :item, `sabor` = :sabor, `quantidade` = :quantidade WHERE `pedido_id` = :pedido_id";
		
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':item', $item);
		$stmt->bindParam(':sabor', $sabor);
		$stmt->bindParam(':quantidade', $quantidade);
		$stmt->bindParam(':pedido_id', $pedido_id);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>
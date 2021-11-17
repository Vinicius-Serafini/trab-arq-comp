<?php
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['id'])){
		$query = "DELETE FROM `pedido` WHERE pedido_id = '$_REQUEST[id]'";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
	}

?>
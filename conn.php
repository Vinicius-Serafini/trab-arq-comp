<?php 
  $conn = new PDO('sqlite:db/database.sqlite3');

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $query = "CREATE TABLE IF NOT EXISTS pedido (pedido_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, item TEXT, sabor TEXT, quantidade INTEGER)";

  $conn->exec($query);
?>
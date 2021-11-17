<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Arq. de Comp e S.O.</title>
</head>
<body>
  <div style="display:grid; place-items: center; padding-top: 50px">
    <div class="col-md-6 card">
      <div class="card-body">
        <div class="card-title">
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#form_modal">
            Adicionar Pedido
          </button>
        </div>
        <table class="table table-bordered">
          <thead class="alert-info">
            <tr>
              <th>Item</th>
              <th>Sabor</th>
              <th>Quantidade</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              require 'conn.php';
              $query = $conn->prepare("SELECT * FROM `pedido`");
              $query->execute();
              while($fetch = $query->fetch()){
            ?>
            <tr>
              <td><?php echo $fetch['item']?></td>
              <td><?php echo $fetch['sabor']?></td>
              <td><?php echo $fetch['quantidade']?></td>
              <td>
                <button 
                class="btn btn-warning" 
                type="button" 
                data-bs-toggle="modal" 
                data-bs-target="#update_pedido<?php echo $fetch['pedido_id']?>"
                >
                  Editar
                </button> 
                <a href="delete.php?id=<?php echo $fetch['pedido_id']?>" class="btn btn-danger">
                  Remover
                </a>
              </td>
            </tr>

            <div class="modal fade" id="update_pedido<?php echo $fetch['pedido_id']?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="update.php" method="POST">
                    <div class="modal-header">
                      <h3 class="modal-title">Atualizar pedido</h3>
                    </div>
                    <div class="modal-body">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Item</label>
                          <input type="text" class="form-control" value="<?php echo $fetch['item']?>" name="item"/>
                          <input type="hidden" class="form-control" value="<?php echo $fetch['pedido_id']?>" name="pedido_id"/>
                        </div>
                        <div class="form-group">
                          <label>Sabor</label>
                          <input type="text" class="form-control" value="<?php echo $fetch['sabor']?>" name="sabor"/>
                        </div>
                        <div class="form-group">
                          <label>Quantidade</label>
                          <input type="number" min="1" class="form-control" value="<?php echo $fetch['quantidade']?>" name="quantidade"/>
                        </div>
                      </div>
                    </div>
                    <div style="clear:both;"></div>
                    <div class="modal-footer">
                      <button class="btn btn-warning" name="update">
                        Atualizar
                      </button>
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        Fechar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <div class="modal fade" id="form_modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="save.php">
              <div class="modal-header">
                <h3 class="modal-title">Adicionar pedido</h3>
              </div>
              <div class="modal-body">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Item</label>
                    <input type="text" class="form-control" name="item" required/>
                  </div>
                  <div class="form-group">
                    <label>Sabor</label>
                    <input type="text" class="form-control" name="sabor" required/>
                  </div>
                  <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number" min="1" class="form-control" name="quantidade" value="1"/>
                  </div>
                </div>
              </div>
              <div style="clear:both;"></div>
              <div class="modal-footer">
                <button class="btn btn-primary" name="save">salvar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Fechar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      
  </div>
  

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
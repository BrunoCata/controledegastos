<!doctype html>
<html lang="en">
  <head>
    <title>Controle de gastos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once 'processo.php'; ?>

    <?php
      if(isset($_SESSION['mensagem'])): ?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">

      <?php
       echo $_SESSION['mensagem'];
       unset($_SESSION['mensagem']);
       ?>
      </div>
      <?php endif ?>   
    
    <div class="container">
    <?php
      $conexao = getConnection();
      $stmt = $conexao->query("SELECT * FROM data;");
      $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

      $stmt = $conexao->query("SELECT * FROM gasto WHERE valor");
      $gastos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>  

    <div class="row justify-content-center">
        <table class="table formulario">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Salario</th>
              <th><a class="text-body" href="gastos.php">Gastos</a></th>
            </tr>
          </thead>
    <?php
        foreach($datas as $row): ?>
            <tr>
              <td><?php echo $row['nome'];?></td>
              <td><?php echo $row['salario'];?></td>
              <td></td>
              <!-- <td>
                <a href="formulario.php?editar=<?=$row['id']?>"
                  class="btn btn-info">Editar</a>
                <a href="processo.php?deletar=<?php echo $row['id'];?>"
                  class="btn btn-danger">Deletar</a>  
              </td> -->
            </tr>
    <?php endforeach; ?>
        
        </table>


    </div>

    <?php
        function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }
    ?>
    <!-- <div class="row justify-content-center">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <form action="processo.php" method="POST">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" 
            value ="<?php echo $name; ?>"placeholder="Digite seu nome">
        </div>
        <div class="form-group">
        <label>Salario</label>
        <input type="text" name="salario" class="form-control" 
              value= "<?php echo $salario; ?>"placeholder="Digite seu salario">
        </div>
        <div class="form-group">
          <?php
            if($update == true): ?>
              <button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
          <?php else: ?>
              <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
      <?php endif; ?>    
        </div>
      </form>
    </div>
    </div> -->
  </body>
</html>
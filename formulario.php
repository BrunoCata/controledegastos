<!doctype html>
<html lang="en">
  <head>
    <title>PHP CRUD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    
    <?php
      require_once 'processo.php';
      
      $funcionando = $conexao->rowCount();      
      $conexao = getConnection();

      if($funcionando != 0){  
        try{
          $nome = $_POST['nome'];
          $senha = $_POST['senha'];
          $conexao = $conexao->prepare("SELECT * FROM login WHERE nome = :nome AND senha = :senha");

          $conexao->bindValue(":nome", $nome);
          $conexao->bindValue(":senha", $senha);

          $conexao->execute(); 

      } catch(Exception $e){
          $e->getMessage(); 
      }
    } else{
        header("Location: index.php");
    }
         
    ?>
  
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
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="row justify-content-center">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Localizaçao</th>
              <th colspan="2">Açao</th>
            </tr>
          </thead>
    <?php
        foreach($result as $row): ?>
            <tr>
              <td><?php echo $row['nome'];?></td>
              <td><?php echo $row['localizacao'];?></td>
              <td>
                <a href="index.php?editar=<?php echo $row['id'];?>"
                  class="btn btn-info">Editar</a>
                <a href="processo.php?deletar=<?php echo $row['id'];?>"
                  class="btn btn-danger">Deletar</a>  
              </td>
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
    <div class="row justify-content-center">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <form action="processo.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" 
            value ="<?php echo $name; ?>"placeholder="Digite seu nome">
        </div>
        <div class="form-group">
        <label>Localizacao</label>
        <input type="text" name="localizacao" class="form-control" 
              value= "<?php echo $localizacao; ?>"placeholder="Digite sua localizacao">
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
    </div>
  </body>
</html>
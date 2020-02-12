<!doctype html>
<html lang="en">
  <head>
    <title>Gastos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <?php 
        require_once '/home/mario-ti/mario_dev/controledegastos/model/conexao.class.php';
        require_once '/home/mario-ti/mario_dev/controledegastos/model/processoGastos.php';
        
        $conexao = new Database();
        $conecta = $conexao->getConnection();
    
        $id_pessoa = $_SESSION['usuario']['id_pessoa'];
        $conecta = $conecta->prepare("SELECT * FROM gasto WHERE id_pessoa = :id_pessoa");
        $conecta->bindValue(':id_pessoa', $id_pessoa);
        $conecta->execute();
        $gastos = $conecta->fetchAll(PDO::FETCH_ASSOC);
      ?>
    
    <div class="row justify-content-center">
        <table class="table formulario">
          <thead>
            <tr>
              <th>Descrição</th>
              <th>Valor</th>
              <th>Data</th>
              <th><a class="text-body" href="/view/formulario.php">Voltar</a></th>
            </tr>
          </thead>
    <?php
        foreach($gastos as $gasto): ?>
            <tr>
              <td><?php echo $gasto['descricao'];?></td>
              <td><?php echo $gasto['valor'];?></td>
              <td><?php echo $gasto['data_gasto'];?></td>
              <td><a href="/model/processoGastos.php?deletar=<?=$gasto['id_gasto'];?>" 
                class="btn btn-danger">Deletar</a></td>
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" cantesrossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <form action="processoGastos.php" method="POST">
        <input type="hidden" name="id_produto" value="<?=$id_produto?>">
        <div class="form-group">
          <label>Descricao</label>
          <input type="text" name="descricao" class="form-control" value ="<?php echo $descricao; ?>" placeholder="Digite a descrição do gasto" required>
        </div>
        <div class="form-group">
          <label>Valor</label>
          <input type="text" name="valor" class="form-control" value="<?php echo $valor; ?>"placeholder="Digite o valor" required>
        </div>
        <div class="form-group">
          <?php
            if($update == true): ?>
              <button type="submit" class="btn btn-info" name="atualizar">Atualizar</button>
          <?php else: ?>
              <button type="submit" class="btn btn-primary" name="salvar">Salvar</button>
      <?php endif; ?>    
        </div>
  </body>
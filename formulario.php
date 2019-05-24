<!doctype html>
<html lang="en">
  <head>
    <title>Controle de gastos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>
    <?php require_once 'processoGastos.php'; ?>
   
    <div class="container">     

    <div class="row justify-content-center">
        <table class="table formulario">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Salario</th>
              <th><a class="text-body" href="gastos.php">Gastos</a></th>
              <th><a class="text-body" href="index.php">Sair</a></th>
            </tr>
          </thead>
            <tr>
              <td><?=$_SESSION['usuario']['nome'];?></td>
              <td><?=$_SESSION['usuario']['salario'];?></td>
            </tr>        
        </table>


    </div>

    <?php
        function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '</pre>';
        }
    ?>
    </div>
  </body>
</html>
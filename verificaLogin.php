<?php
  
  require_once 'conexao.php';
  
      $conexao = getConnection();      

        try{
          $login = $_POST['login'];
          $senha = $_POST['senha'];
          $conexao = $conexao->prepare("SELECT * FROM pessoa WHERE login = :login AND senha = :senha");

          $conexao->bindValue(":login", $login);
          $conexao->bindValue(":senha", $senha);

          $conexao->execute();
          $resultado = $conexao->fetch(PDO::FETCH_ASSOC); 

      } catch(Exception $e){
        return "Ocorreu o seguinte erro:<br>" . $e->getMessage(); 
      }

      if(!$resultado){
        header("location: index.php");
      } else{
          header("location: formulario.php");
      }
?>
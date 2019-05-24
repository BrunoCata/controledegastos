<?php
  
  require_once 'classeDatabase.php';

      $conexao = new Database();      
      $conecta = $conexao->getConnection();

        try{
          $login = $_POST['login'];
          $senha = $_POST['senha'];
          $conecta = $conecta->prepare("SELECT * FROM pessoa WHERE login = :login AND senha = :senha");

          $conecta->bindValue(":login", $login);
          $conecta->bindValue(":senha", $senha);

          $conecta->execute();
          $resultado = $conecta->fetch(PDO::FETCH_ASSOC); 

          $id_pessoa = $resultado['id_pessoa'];


      } catch(Exception $e){
        return "Ocorreu o seguinte erro:<br>" . $e->getMessage(); 
      }

      if(!$resultado){
        header("location: index.php");
      } else{
          session_start();
          $_SESSION['usuario'] = $resultado;
          header("location: formulario.php");
      }
?>
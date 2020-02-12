<?php 

require_once 'conexao.class.php';

$conexao = new Database();
$conecta = $conexao->getConnection();

    try{               
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $salario = $_POST['salario'];
        $parametros = array('login' => $login, 'senha' => $senha, 'nome' => $nome, 'salario' => $salario);

        $conecta = $conecta->prepare("INSERT INTO pessoa (login, senha, nome, salario) VALUES(:login, :senha, :nome, :salario)");
        $conecta->execute($parametros);
        

        $_SESSION['mensagem'] = "Usuario cadastrado";
        $_SESSION['msg_type'] = "sucesso";

        header("location: index.php");

    } catch(Exception $e){  
        echo 'Exceção capturada: ',  $e->getMessage();
    }

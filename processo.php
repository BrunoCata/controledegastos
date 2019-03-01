<?php

require_once 'conexao.php';

session_start();
ini_set( 'display_errors', 0 );

$conexao = getConnection();

if(isset($_POST['salvar'])){

    try{
                   
    $name = $_POST['nome'];
    $salario = $_POST['salario'];
    $parametros = array('name' => $name, 'salario' => $salario);

    $conexao =  $conexao->prepare("INSERT INTO data (nome, salario) VALUES(:name, :salario)");
    $conexao->execute($parametros);
    
    $_SESSION['mensagem'] = "Registro salvo!";
    $_SESSION['msg_type'] = "sucesso";

    header("location: formulario.php");

    } catch(Exception $e){
        $e->getMessage();  
    }
}

if(isset($_GET['deletar'])){

    try{

    $id = $_GET['deletar'];
    $parametros = array('name' => $name, 'salario' => $salario);
    
    $conexao = $conexao->prepare("DELETE FROM data WHERE id = $id");
    $conexao->execute($parametros);

    $_SESSION['mensagem'] = "Registro deletado!";
    $_SESSION['msg_type'] = "danger";

    header("location: formulario.php");
    } catch(Exception $e){
        $e->getMessage();
    }
}

if(isset($_GET['editar'])){

    try{
    $id = $_GET['editar'];
    $parametros = array('id' => $id);
    $update = true;
    $conexao = $conexao->prepare("SELECT * FROM data WHERE id = :id");
    $conexao->execute($parametros);
    
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    $name = $result['nome'];
    $salario = $result['salario'];

    header('formulario.php');
    
    } catch(Exception $e){
        $e->getMessage();
    }

}

if(isset($_POST['atualizar'])){

    try{

    $id = $_POST['id'];
    $name = $_POST['nome'];
    $salario = $_POST['salario'];
    $parametros = array('id' => $id, 'name' => $name, 'salario' => $salario);

    $conexao = $conexao->prepare("UPDATE data SET nome = :name, salario = :salario WHERE id = :id");
    $conexao->execute($parametros);
    $conexao->fetch(PDO::FETCH_ASSOC);    

    $_SESSION['mensagem'] = "Registro atualizado";
    $_SESSION['msg_type'] = "warning";

    header('location: formulario.php');
    
    } catch(Exception $e){
        $e->getMessage();
    }
}

?>
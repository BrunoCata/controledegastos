<?php

require_once 'conexao.class.php';

ini_set( 'display_errors', 0 );

$conecta = new Database();
$conexao = $conecta->getConnection();


if(isset($_POST['salvar'])){

    try{
                   
    $name = $_POST['nome'];
    $salario = $_POST['salario'];
    $parametros = array('nome' => $nome, 'salario' => $salario);

    $conexao =  $conexao->prepare("INSERT INTO pessoa (nome, salario) VALUES(:nome, :salario)");
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
    $parametros = array('nome' => $nome, 'salario' => $salario);
    
    $conexao = $conexao->prepare("DELETE FROM pessoa WHERE id_pessoa = $id_pessoa");
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
    $parametros = array('id_pessoa' => $id_pessoa);
    $update = true;
    $conexao = $conexao->prepare("SELECT * FROM pessoa WHERE id_pessoa = :id_pessoa");
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

    $id = $_POST['id_pessoa'];
    $name = $_POST['nome'];
    $salario = $_POST['salario'];
    $parametros = array('id_pessoa' => $id_pessoa, 'nome' => $nome, 'salario' => $salario);

    $conexao = $conexao->prepare("UPDATE pessoa SET nome = :nome, salario = :salario WHERE id_pessoa = :id_pessoa");
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
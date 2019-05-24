<?php

require_once 'classeDatabase.php';

ini_set( 'display_errors', 0 );

$conexao = new Database();
$conecta = $conexao->getConnection();

if(isset($_POST['salvar'])){

    try{
                   
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $id_pessoa = $_SESSION['usuario']['id_pessoa'];
    $parametros = array('descricao' => $descricao, 'valor' => $valor, 'id_pessoa' => $id_pessoa);

    $conecta = $conecta->prepare("INSERT INTO gasto (descricao, valor, id_pessoa) VALUES(:descricao, :valor, :id_pessoa)");
    $conecta->execute($parametros);
    
    $_SESSION['mensagem'] = "Registro salvo!";
    $_SESSION['msg_type'] = "sucesso";

    header("location: gastos.php");

    } catch(Exception $e){
        $e->getMessage();  
    }
}

if(isset($_GET['deletar'])){

    try{

    $id_gasto = $_GET['deletar'];
    $parametros = array('id_gasto' => $id_gasto);
    
    $conecta = $conecta->prepare("DELETE FROM gasto WHERE id_gasto = :id_gasto");
    $conecta->execute($parametros);

    header("location: gastos.php");
    } catch(Exception $e){
       echo $e->getMessage();
    }
}

if(isset($_GET['editar'])){

    try{
    $id = $_GET['editar'];
    $parametros = array('id_produto' => $id_produto);
    $update = true;
    $conecta = $conecta->prepare("SELECT * FROM gasto WHERE id_produto = :id_produto");
    $conecta->execute($parametros);
    
    $result = $conecta->fetch(PDO::FETCH_ASSOC);
    $name = $result['descricao'];
    $salario = $result['valor'];

    header('gastos.php');
    
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

    $conecta = $conecta->prepare("UPDATE pessoa SET nome = :nome, salario = :salario WHERE id_pessoa = :id_pessoa");
    $conecta->execute($parametros);
    $conecta->fetch(PDO::FETCH_ASSOC);    

    $_SESSION['mensagem'] = "Registro atualizado";
    $_SESSION['msg_type'] = "warning";

    header('location: formulario.php');
    
    } catch(Exception $e){
        $e->getMessage();
    }
}

?>
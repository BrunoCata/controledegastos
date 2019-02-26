<?php

session_start();
ini_set( 'display_errors', 0 );

function getConnection(){    
    $host = "localhost";
    $banco = "crud";
    $usuario = "mario";
    $senha = "Bruno100!";
        
    try{
        $conexao = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha, NULL);
        return $conexao;
    } catch(PDOException $e){
        return "Ocorreu o seguinte erro:<br>" . $e->getMessage();
    }
}

$conexao = getConnection();

if(isset($_POST['salvar'])){

    try{
                   
    $name = $_POST['nome'];
    $localizacao = $_POST['localizacao'];
    $parametros = array('name' => $name, 'localizacao' => $localizacao);

    $conexao =  $conexao->prepare("INSERT INTO data (nome, localizacao) VALUES(:name, :localizacao)");
    $conexao->execute($parametros);
    
    $_SESSION['mensagem'] = "Registro salvo!";
    $_SESSION['msg_type'] = "sucesso";

    header("location: index.php");

    } catch(Exception $e){
        $e->getMessage();  
    }
}

if(isset($_GET['deletar'])){

    try{

    $id = $_GET['deletar'];
    $parametros = array('name' => $name, 'localizacao' => $localizacao);
    
    $conexao = $conexao->prepare("DELETE FROM data WHERE id = $id");
    $conexao->execute($parametros);

    $_SESSION['mensagem'] = "Registro deletado!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
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
    $localizacao = $result['localizacao'];
    
    } catch(Exception $e){
        $e->getMessage();
    }

}

if(isset($_POST['atualizar'])){

    try{

    $id = $_POST['id'];
    $name = $_POST['nome'];
    $localizacao = $_POST['localizacao'];
    $parametros = array('id' => $id, 'name' => $name, 'localizacao' => $localizacao);

    $conexao = $conexao->prepare("UPDATE data SET nome = :name, localizacao = :localizacao WHERE id = :id");
    $conexao->execute($parametros);
    $conexao->fetch(PDO::FETCH_ASSOC);    

    $_SESSION['mensagem'] = "Registro atualizado";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
    
    } catch(Exception $e){
        $e->getMessage();
    }
}

?>
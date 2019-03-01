<?php

function getConnection(){    
    $host = "localhost";
    $banco = "controledegastos";
    $usuario = "mario";
    $senha = "Bruno100!";
        
    try{
        $conexao = new PDO("mysql:host=$host;dbname=$banco", $usuario, $senha, NULL);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch(PDOException $e){
        return "Ocorreu o seguinte erro:<br>" . $e->getMessage();
    }
}

?>
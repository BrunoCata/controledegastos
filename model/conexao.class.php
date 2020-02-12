<?php

// session_start();

// ini_set( 'display_errors', false );

class Database{    
 
    public $host = "localhost";
    public $banco = "controledegastos";
    public $usuario = "mario";
    public $senha = "123";
    public $conexao;
    
    function getConnection(){   
        try{
            $conexao = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->usuario, $this->senha, NULL);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        } catch(PDOException $e){
            return "Ocorreu o seguinte erro:<br>" . $e->getMessage();
        }
    }
}

?>
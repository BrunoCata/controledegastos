<?php

session_start();

ini_set( 'display_errors', false );

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

    function buscaGastoDaPessoa(){
    
        $id_pessoa = $_SESSION['usuario']['id_pessoa'];
        $conecta = $conecta->prepare("SELECT * FROM gasto WHERE id_pessoa = :id_pessoa");
        
        $conecta->bindValue(':id_pessoa', $id_pessoa);
        $conecta->execute();
        $gastos = $conecta->fetchAll(PDO::FETCH_ASSOC);  
    }
}

?>
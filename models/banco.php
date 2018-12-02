<?php
define("DSN","mysql");
define("SERVIDOR","localhost");
define("USUARIO","root");
define("SENHA","");
define("BANCODEDADOS","sistemapetshop");

function conectar(){
    try{
        $conn = new PDO(DSN.':host='.SERVIDOR.';dbname='.BANCODEDADOS,USUARIO,SENHA);
        return $conn;
    }catch(PDOException $e){
        echo ''.$e->get_Message();
    }
}

?>
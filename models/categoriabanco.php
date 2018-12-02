<?php

include_once("../models/banco.php");    

function salvarCategoria($categoria)  {  
    $conn = conectar();
    
    $stmt= $conn->prepare('INSERT INTO categorias (categoria) VALUES(:categoria)');
    $stmt->bindParam(':categoria',$categoria['categoria']);    
    
    if($stmt->execute()){
        return  true;
    }else{
        print_r($stmt->errorInfo());
        return  false;
    }

}

function buscarCategoria($id){
    $conn = conectar();

    $stmt = $conn->prepare("select id,categoria from categorias where id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function listarCategorias(){
    $conn = conectar();

    $stmt = $conn->prepare("select id,categoria from categorias order by id");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function editarCategoria($categoria){
    $conn = conectar();
    
    $stmt= $conn->prepare('UPDATE categorias SET categoria = :categoria  WHERE id = :id');
    $stmt->bindParam(':categoria',$categoria['categoria']);    
    $stmt->bindParam(':id',$categoria['id']);
    if($stmt->execute()){
        return  true;
    }else{
        print_r($stmt->errorInfo());
        return  false;
    }
}

function excluirCategoria($id){
    $conn = conectar();

    $stmt = $conn->prepare("DELETE FROM categorias WHERE id = :id");
    $stmt->bindParam(":id",$id);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}


?>
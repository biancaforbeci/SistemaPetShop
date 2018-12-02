<?php

include_once("../models/banco.php");    

function salvarProduto($produto)  {  
    $conn = conectar();
    
    $stmt= $conn->prepare('INSERT INTO produtos (nome,raca,idade,material,cor,marca,tipo,id_categoria,preco,dimensoes,descricao,imagem) VALUES(:nome,:raca,:idade,:material,:cor,:marca,:tipo,:id_categoria,:preco,:dimensoes,:descricao,:imagem)');
    $stmt->bindParam(':nome',$produto['nome']);
    $stmt->bindParam(':raca',$produto['raca']);
    $stmt->bindParam(':idade',$produto['idade']);
    $stmt->bindParam(':material',$produto['material']);
    $stmt->bindParam(':cor',$produto['cor']);
    $stmt->bindParam(':marca',$produto['marca']);
    $stmt->bindParam(':tipo',$produto['tipo']);
    $stmt->bindParam(':id_categoria',$produto['categoria']);
    $stmt->bindParam(':preco',$produto['preco']);
    $stmt->bindParam(':dimensoes',$produto['dimensoes']);    
    $stmt->bindParam(':descricao',$produto['descricao']);
    $stmt->bindParam(':imagem',$produto['imagem']);
   
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }    
    
}

function listarProdutos(){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome,raca,idade,material,cor,marca,tipo,id_categoria,preco,dimensoes,descricao,imagem from produtos order by id");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function buscarProduto($id){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome,raca,idade,material,cor,marca,tipo,id_categoria,preco,dimensoes,descricao,imagem from produtos where id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editarProduto($produto){
    $conn = conectar();
    
    $stmt= $conn->prepare('UPDATE produtos SET nome = :nome, raca = :raca, idade = :idade, material = :material, cor = :cor, marca = :marca, tipo = :tipo, id_categoria = :id_categoria, preco = :preco, dimensoes = :dimensoes, descricao = :descricao, imagem = :imagem WHERE id = :id');
    $stmt->bindParam(':nome',$produto['nome']);
    $stmt->bindParam(':raca',$produto['raca']);
    $stmt->bindParam(':idade',$produto['idade']);
    $stmt->bindParam(':material',$produto['material']);
    $stmt->bindParam(':cor',$produto['cor']);
    $stmt->bindParam(':marca',$produto['marca']);
    $stmt->bindParam(':tipo',$produto['tipo']);
    $stmt->bindParam(':id_categoria',$produto['categoria']);
    $stmt->bindParam(':preco',$produto['preco']);
    $stmt->bindParam(':dimensoes',$produto['dimensoes']);
    $stmt->bindParam(':descricao',$produto['descricao']);
    $stmt->bindParam(':imagem',$produto['imagem']);
    $stmt->bindParam(':id',$produto['id']);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

function excluirProduto($id){
    $conn = conectar();

    $stmt = $conn->prepare("DELETE FROM produtos WHERE id = :id");
    $stmt->bindParam(":id",$id);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

function buscaProdutoProcurado($nome){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome,raca,idade,material,cor,marca,tipo,id_categoria,preco,dimensoes,descricao,imagem from produtos where nome = :nome order by nome");
    $stmt->bindParam(":nome",$nome);
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}


?>
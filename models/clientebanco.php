<?php

include_once("../models/banco.php");    

function salvarClienteBanco($cliente)  {  
    $conn = conectar();
    
    $stmt= $conn->prepare('INSERT INTO clientes (nome_cliente,sobrenome,cpf,telefone,endereco,logradouro,cidade,estado,cep, email, senha) VALUES(:nome,:sobrenome,:cpf,:telefone,:endereco,:logradouro,:cidade,:estado,:cep,:email,:senha)');
    $stmt->bindParam(':nome',$cliente['nome']);
    $stmt->bindParam(':sobrenome',$cliente['sobrenome']);
    $stmt->bindParam(':cpf',$cliente['cpf']);
    $stmt->bindParam(':telefone',$cliente['telefone']);
    $stmt->bindParam(':endereco',$cliente['endereco']);
    $stmt->bindParam(':logradouro',$cliente['logradouro']);
    $stmt->bindParam(':cidade',$cliente['cidade']);
    $stmt->bindParam(':estado',$cliente['estado']);
    $stmt->bindParam(':cep',$cliente['cep']);
    $stmt->bindParam(':email',$cliente['email']);
    $stmt->bindParam(':senha',$cliente['senha']);
    
    if($stmt->execute()){
        return  true;
    }else{
        print_r($stmt->errorInfo());
        return  false;
    }

}

function listarClientesBanco(){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome_cliente,sobrenome,cpf,telefone,endereco,logradouro,cidade,estado,cep from clientes order by id");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function buscarClienteBanco($id){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome_cliente,sobrenome,cpf,telefone,endereco,logradouro,cidade,estado,cep, email, senha from clientes where id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function buscarEmailBanco($email){
    $conn = conectar();

    $stmt = $conn->prepare("select id,nome_cliente,sobrenome,cpf,telefone,endereco,logradouro,cidade,estado,cep, email, senha from clientes where email = :email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editarClienteBanco($cliente){
    $conn = conectar();
    
    $stmt= $conn->prepare('UPDATE clientes SET nome_cliente = :nome, sobrenome = :sobrenome, cpf = :cpf, telefone = :telefone, endereco = :endereco, logradouro = :logradouro, cidade = :cidade, estado = :estado, cep = :cep, email = :email, senha = :senha WHERE id = :id');
    $stmt->bindParam(':nome',$cliente['nome']);
    $stmt->bindParam(':sobrenome',$cliente['sobrenome']);
    $stmt->bindParam(':cpf',$cliente['cpf']);
    $stmt->bindParam(':telefone',$cliente['telefone']);
    $stmt->bindParam(':endereco',$cliente['endereco']);
    $stmt->bindParam(':logradouro',$cliente['logradouro']);
    $stmt->bindParam(':cidade',$cliente['cidade']);
    $stmt->bindParam(':estado',$cliente['estado']);
    $stmt->bindParam(':cep',$cliente['cep']);
    $stmt->bindParam(':email',$cliente['email']);
    $stmt->bindParam(':senha',$cliente['senha']);
    $stmt->bindParam(':id',$cliente['id']);
    if($stmt->execute()){
        return  true;
    }else{
        print_r($stmt->errorInfo());
        return  false;
    }
}

function excluirClienteBanco($id){
    $conn = conectar();

    $stmt = $conn->prepare("DELETE FROM clientes WHERE id = :id");
    $stmt->bindParam(":id",$id);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

function agendamentoExiste($cliente){
    $conn = conectar();

    $stmt = $conn->prepare("DELETE FROM agendamentos WHERE cliente = :cliente");
    $stmt->bindParam(":cliente",$cliente);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

?>
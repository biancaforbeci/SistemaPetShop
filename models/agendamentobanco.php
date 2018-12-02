<?php

include_once("../models/banco.php");    

function salvarAgendamento($informacoes)  {  
    $conn = conectar();
    
    $stmt= $conn->prepare('INSERT INTO agendamentos (pet,age,porte,raca,animal,cliente,dtAgendamento,servico,hora,preco) VALUES(:pet,:age,:porte,:raca,:animal,:cliente,:dtAgendamento,:servico,:hora,:preco)');
    $stmt->bindParam(':pet',$informacoes['pet']);
    $stmt->bindParam(':age',$informacoes['age']);
    $stmt->bindParam(':porte',$informacoes['porte']);
    $stmt->bindParam(':raca',$informacoes['raca']);
    $stmt->bindParam(':animal',$informacoes['animal']);
    $stmt->bindParam(':cliente',$informacoes['cliente']);
    $stmt->bindParam(':dtAgendamento',$informacoes['dtAgendamento']);
    $stmt->bindParam(':servico',$informacoes['servico']);
    $stmt->bindParam(':hora',$informacoes['hora']);
    $stmt->bindParam(':preco',$informacoes['preco']);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }    
    
}

function listarAgendamento(){
    $conn = conectar();

    $stmt = $conn->prepare("SELECT
    agendamentos.id,
    agendamentos.pet,
    agendamentos.age,
    agendamentos.porte,
    agendamentos.raca,
    agendamentos.animal,
    agendamentos.dtAgendamento,
    agendamentos.hora,
    agendamentos.preco,
    agendamentos.servico,
    clientes.nome_cliente,
    clientes.telefone
FROM agendamentos
INNER JOIN clientes
    ON agendamentos.cliente = clientes.id
 ORDER by agendamentos.dtAgendamento");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function listarAgendamentoCliente($cliente){
    $conn = conectar();

    $stmt = $conn->prepare("select id,pet,age,porte,raca,animal,cliente,dtAgendamento,servico,hora,preco from agendamentos where cliente = :cliente order by dtAgendamento");
    $stmt->bindParam(":cliente",$cliente);
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function buscarAgendamento($email){
    $conn = conectar();

    $stmt = $conn->prepare("select id from clientes where email = :email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function editarAgendamento($informacoes){
    $conn = conectar();
    
    $stmt= $conn->prepare('UPDATE agendamentos SET  pet = :pet, age = :age, porte = :porte, raca = :raca, animal = :animal, dtAgendamento = :dtAgendamento, servico = :servico, hora = :hora, preco = :preco WHERE id = :id');
    $stmt->bindParam(':pet',$informacoes['pet']);
    $stmt->bindParam(':age',$informacoes['age']);
    $stmt->bindParam(':porte',$informacoes['porte']);
    $stmt->bindParam(':raca',$informacoes['raca']);
    $stmt->bindParam(':animal',$informacoes['animal']);
    $stmt->bindParam(':dtAgendamento',$informacoes['dtAgendamento']);
    $stmt->bindParam(':servico',$informacoes['servico']);
    $stmt->bindParam(':hora',$informacoes['hora']);
    $stmt->bindParam(':preco',$informacoes['preco']);
    $stmt->bindParam(':id',$informacoes['id']);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

function retornoAgendamento($id){
    $conn = conectar();

    $stmt = $conn->prepare("select id, pet,age,porte,raca,animal,cliente,dtAgendamento,servico,hora,preco from agendamentos where id = :id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function excluirAgendamentoBanco($id){
    $conn = conectar();

    $stmt = $conn->prepare("DELETE FROM agendamentos WHERE id = :id");
    $stmt->bindParam(":id",$id);
    if($stmt->execute()){
        return true;
    }else{
        print_r($stmt->errorInfo());
        return false;
    }
}

function listarValores(){
    $conn = conectar();

    $stmt = $conn->prepare("select id,porte,pelagem,preco,servico from precos order by id");
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function precoEncontrado($porte,$pelagem,$servico){
    $conn = conectar();

    $stmt = $conn->prepare("select preco from precos where porte = :porte AND pelagem = :pelagem AND servico = :servico");
    $stmt->bindParam(":porte",$porte);
    $stmt->bindParam(":pelagem",$pelagem);
    $stmt->bindParam(":servico",$servico);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


?>
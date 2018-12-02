<?php

include_once("../models/banco.php"); 

function salvaReserva($lista,$cliente,$total){

    $conn = conectar();
    $conn->beginTransaction();

    $stmt = $conn->prepare("INSERT INTO pedido (id_cliente,total_pedido,data_compra) values (:id_cliente,:total_pedido,now())");
    $stmt->bindParam(":id_cliente",$cliente);
    $stmt->bindParam(":total_pedido",$total);
    $stmt->execute();
    $id_pedido= $conn->lastInsertId();

     foreach($lista as $produto){     
    
        $stmt= $conn->prepare('INSERT INTO item_pedido (id_produto,id_pedido,qtd,subtotal) VALUES(:id_produto,:id_pedido,:qtd,:subtotal)');
        $stmt->bindParam(':id_produto',$produto['id']);
        $stmt->bindParam(':id_pedido',$id_pedido);
        $stmt->bindParam(':qtd',$produto['qtdSession']);
        $stmt->bindParam(':subtotal',$produto['preco']);        
        $stmt->execute();  
    }
    $conn->commit();

    return true;
}


function listagemReservas($id){
    $conn = conectar();

    $stmt = $conn->prepare("SELECT
    pedido.id,
    pedido.total_pedido,
    pedido.data_compra,
    produtos.nome,
    item_pedido.qtd
FROM pedido
INNER JOIN item_pedido ON item_pedido.id_pedido = pedido.id
INNER JOIN produtos
    ON item_pedido.id_produto = produtos.id
where pedido.id_cliente = :cliente 
 ORDER by pedido.data_compra");
    $stmt->bindParam(":cliente",$id);
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function todasReservas(){
    $conn = conectar();

    $stmt = $conn->prepare("SELECT
    pedido.id,
    pedido.id_cliente,
    pedido.total_pedido,
    pedido.data_compra,
    clientes.nome_cliente,
    clientes.telefone,
    produtos.nome,
    item_pedido.qtd
FROM pedido
INNER JOIN item_pedido ON item_pedido.id_pedido = pedido.id
INNER JOIN produtos
    ON item_pedido.id_produto = produtos.id
INNER JOIN clientes
    ON pedido.id_cliente = clientes.id
 ORDER by  pedido.data_compra");
    $stmt->bindParam(":cliente",$id);
    $stmt->execute();
    $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $retorno;
}

function buscarClienteReserva($email){
    $conn = conectar();

    $stmt = $conn->prepare("select id from clientes where email = :email");
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<?php

include_once("../models/reservasbanco.php"); 
include_once("../controllers/funcoes.php"); 


function salvarItensReservados($cliente,$itens,$post){
    $cli=buscaCliente($cliente);
    $clienteItens=$cli['id'];  
    $total=$_POST['total']; 
    $carrinho=$itens;
    try{
        $r=salvaReserva($carrinho,$clienteItens,$total,$quantidade);
        if($r){
            unset($_SESSION['carrinho']);		
            return true;
        }    
    }catch (Exception $erro){
          return $erro->getMessage();          
     } 
}

function buscarReservas(){
    return todasReservas();
}

function retornaReservas($email){
    $cliente=buscarClienteReserva($email);
    return listagemReservas($cliente['id']);
}

?>
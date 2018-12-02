<?php
require_once('../models/clientebanco.php');

if (!empty($_GET)) {        
    
    if($_GET['acao']=='editar'){  
        $id = $_GET['id'];             
        buscarClientenoBanco($id);
    }
    if($_GET['acao']=='excluir'){
        $id = $_GET['id'];
        excluirCliente($id);
    }
    if($_GET['acao']=='detalhes'){   
        $cliente=buscaCliente($_SESSION['user']);     
        $id = $cliente['id'];
        $nome = $cliente['nome_cliente'];
        $sobrenome = $cliente['sobrenome'];
        $cpf= $cliente['cpf'];
        $telefone= $cliente['telefone'];
        $endereco= $cliente['endereco'];
        $logradouro= $cliente['logradouro'];
        $cidade= $cliente['cidade'];
        $estado= $cliente['estado'];
        $cep= $cliente['cep'];
        $email = $cliente['email'];
        $senha = $cliente['senha'];
    }
}

function salvarCliente($post){   
    if(!empty($post)){
        if(salvarClienteBanco($post)){
            return true;
        }else{
            return false;
        }        
    }        
}

function buscaCliente($cliente){
    return buscarEmailBanco($cliente);
}

function listarClientes(){
    return listarClientesBanco();
}

function editarCliente($cliente){
    if(editarClienteBanco($cliente)){        
        return true;
    }else{
        return false;
    }   
}

function buscarClientenoBanco($id){
    $cliente = buscarClienteBanco($id);
    if(!empty($cliente)){
        session_start();
        $_SESSION['cliente'] = $cliente; 
        header("location: ../views/cadastroClientes.php");    
    }
}

function excluirCliente($id){
    if(excluirClienteBanco($id)){
        excluirAgendamento($id);
        return true;   
    }else{
        return false;
    }        
}

function excluirAgendamento($id){
      agendamentoExiste($id);  
}

?>
<?php
require_once('../models/agendamentobanco.php');


if (!empty($_GET)) { 
    date_default_timezone_set('America/Sao_Paulo');
    $now = date("Y-m-d");  
    $hnow=date('H:i:s');  
    $hcli=$_GET['hora'];
    $escolhida= $_GET['data'];       
    $id = $_GET['id'];
    if($_GET['acao']=='editar'){               
        buscaAgendamentoEdicao($id);
    }
    if($_GET['acao']=='excluir'){
        if((strtotime($escolhida) < strtotime($now))   || (strtotime($escolhida) > strtotime($now))  || (strtotime($escolhida) == strtotime($now) && strtotime($hnow) < strtotime($hcli) ) ){
            excluir($id);
        }else{
            $_SESSION['message']="Só pode excluir um dia antes do agendamento, entre em contato !";
        }
        
    }
}

function salvar($post,$cliente){
     $cli=buscarAgendamento($cliente);   
     $post['cliente']=$cli['id'];
     $preco=retornaPreco($post['porte'],$post['animal'],$post['servico']);
     $post['preco']=$preco['preco'];
     $response=salvarAgendamento($post);    
     
     if($response==true){
        return true;  
     }else{
        return false;
     }
}

function listar(){
    return listarAgendamento();
}

function editar($cliente){
    $preco=retornaPreco($cliente['porte'],$cliente['animal'],$post['servico']);
    $cliente['preco']=$preco['preco'];
    if(editarAgendamento($cliente)){        
        return true;  
    }else{
        return false;
    }
}

function buscar($cliente){
    $cli=buscarAgendamento($cliente);   
    return listarAgendamentoCliente($cli['id']);
}

function buscaAgendamentoEdicao($id){
    $agenda = retornoAgendamento($id);
    if(!empty($agenda)){
        session_start();
        $_SESSION['agenda'] = $agenda; 
        header("location: ../views/agendamento.php");    
    }
}

function excluir($id){
    if(excluirAgendamentoBanco($id)){
        header("location: ../views/listagemAgendamentos.php");          
    }else{
        return false;
    }        
}

function retornaValores(){
    return listarValores();
}

function retornaPreco($porte,$pelagem,$servico){
    return precoEncontrado($porte,$pelagem,$servico);
}

?>
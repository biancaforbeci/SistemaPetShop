<?php
require_once('../models/categoriabanco.php');

function salvarCat($post){   
    if(!empty($post)){
        if(salvarCategoria($post)){
            return true;
        }else{
            return false;
        }        
    }        
}

function listarCat(){
    return listarCategorias();
}

function buscarCat($id){
    $cliente = buscarCategoria($id);
    if(!empty($cliente)){
        return $cliente;    
    }
}

function editarCat($cliente){
    if(editarCategoria($cliente)){
        return true;
    }else{
        return false;
    }   
}

function excluirCat($id){
    if(excluirCategoria($id)){
        return true;
    }else{
        return false;
    }        
}

?>
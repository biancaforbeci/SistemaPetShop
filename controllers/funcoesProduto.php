<?php
require_once('../models/produtobanco.php');


         if (!empty($_GET)) {        
           $id = $_GET['id'];
             if($_GET['acao']=='editar'){               
             buscar($id);
            }
             if($_GET['acao']=='excluir'){
              excluir($id);
             }
             
            if($_GET['acao']=='detalhes'){     

          $produto = detalhes($id);
          $id = $produto['id'];
         $nome = $produto['nome'];
          $raca = $produto['raca'];
          $idade= $produto['idade'];
          $material= $produto['material'];
          $cor= $produto['cor'];
          $marca= $produto['marca'];
          $tipo= $produto['tipo'];
          $c=buscarCat($produto['id_categoria']);         
          $categoria=$c['categoria'];
          $preco= $produto['preco'];
          $dimensoes= $produto['dimensoes'];
          $descricao= $produto['descricao'];   
            }
        } 
    

function salvar($post,$files){   
    $path = salvaImagem($files);
    if(!empty($post)){
        $post['imagem']=$path;
        $post['preco']=str_replace(",",".",$post['preco']);
        if(salvarProduto($post)){
            return true;
        }else{
            return false;
        }             
    }        
}


function salvaImagem($files){
    if ($files['imagem']['error'] == 4){
        $caminho_arquivo= "C:\\xampp\\htdocs\\trabalho\\produtos\\";

        $nome_arquivo= "icon.png";

        $url = 'produtos/'.$nome_arquivo;

        return $url;
    }else{
        $caminho_arquivo= "C:\\xampp\\htdocs\\trabalho\\produtos\\";

        $nome_arquivo= $files['imagem']['name'];

        move_uploaded_file($files['imagem']['tmp_name'],$caminho_arquivo.$nome_arquivo);

        $url = 'produtos/'.$nome_arquivo;

        return $url;
    }
}

function listar(){
    return listarProdutos();
}

function editar($post,$files){
    $path =salvaImagem($files);
    $post['imagem']=$path;
    $post['preco']=str_replace(",",".",$post['preco']);
    if(editarProduto($post)){        
        return true; 
    }else{
        return false;
    }  
}

function buscar($id){    
    $produto = buscarProduto($id);
    if(!empty($produto)){
        session_start();
        $_SESSION['produto'] = $produto;                     
        header("location: ../views/cadastroProduto.php");    
    }
}

function detalhes($id){
    return buscarProduto($id);
}

function excluir($id){    
    if(excluirProduto($id)){
        header("location: ../views/listagemProdutos.php");         
    }else{
        $_SESSION['message']= "Erro ao excluir, tente novamente !";
    }
}

function buscaProdutoDigitado($post){
    $produtos=$post['palavra'];
    $lista = buscaProdutoProcurado($produtos);    
        session_start();
        $_SESSION['busca'] = $lista; 
        header("location: ../views/produtoEncontrado.php");   
}

?>
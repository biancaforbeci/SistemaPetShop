<?php

include_once('../controllers/funcoesProduto.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if(!empty($_GET['acao'])){
  if($_GET['acao']=='logout'){
  session_destroy();             
  header('location:../views/index.php');
  }
}

if(trim($username)=="adm" && trim($password)==123){
  $_SESSION['user']=$username;
  $_SESSION['nomeCli']="Administrador";
  header('location:../views/index.php');
}else if(!empty(buscarLogin(trim($username),trim($password)))){
  $_SESSION['user']=$username;
  $retorno= buscarNome($username,$password);
  $_SESSION['nomeCli']=$retorno['nome_cliente'];
  header('location:../views/index.php');
}else if(empty(buscarEmail(trim($username) ))) {
  echo "Email não cadastrado !";
}else{
  echo "Senha não correspondente ao email !";
}

  function buscarLogin($username,$password){
    $conn = conectar();

    $stmt = $conn->prepare("select email from clientes where email = :email AND senha = :senha");
    $stmt->bindParam(":email",$username);
    $stmt->bindParam(":senha",$password);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   function buscarEmail($username){
    $conn = conectar();

    $stmt = $conn->prepare("select email from clientes where email = :email");
    $stmt->bindParam(":email",$username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   function buscarNome($username,$password){
    $conn = conectar();

    $stmt = $conn->prepare("select nome_cliente from clientes where email = :email AND senha = :senha");
    $stmt->bindParam(":email",$username);
    $stmt->bindParam(":senha",$password);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
   }

?>
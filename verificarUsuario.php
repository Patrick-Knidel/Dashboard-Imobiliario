<?php
  session_start();
  include "conexao/conexao.php";

  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM usuario WHERE nome_usuario = '$usuario'";
  $result = mysqli_query($conexao,$sql);
  $dados = mysqli_fetch_array($result);
  $senhadb = $dados['senha_usuario'];
  $teste = mysqli_affected_rows($conexao);

  if($teste == 1){
    if($senhadb == $senha){
      $_SESSION['usuario'] = $usuario;
      header("Location: home.php");
    }else{
      header("Location: login.php?id=2");
    }
      
  }else{
    header("Location: login.php?id=1");
  }
?>

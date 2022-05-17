<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>ATIVIDADE DE COMENTÁRIOS</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="CSS/cadastrar.css"/>

    </head>
    <body>
<form method="POST">
<h1> Cadastre-se</h1>
    <label for="nome">Nome</label>
    <input type="text" name="nome" maxlength="40">

    <label for="email">E-Mail</label>
    <input type="email" name="email" autocomplete="off" id="email" maxlength="40">

    <label for= "senha">Senha</label>
    <input type="password" name="senha" id="senha">

    <label for= "confsenha">Confirmar Senha</label>
    <input type="password" name="confSenha" id="confSenha">
    <input type="submit" value="Cadastrar">
  
</form>
    </body>
    </html>

    <?php
 if (isset($_POST['nome']))

 {
     $nome = addslashes($_POST['nome']);
     $email = addslashes($_POST['email']);
     $senha = addslashes($_POST['senha']);
     $confSenha = addslashes($_POST['confSenha']); 

     if (!empty($nome) && !empty($email) && !empty($senha) && !empty($confSenha))

     {
         if($senha == $confSenha)
         {
             require_once 'CLASSES/usuarios.php';
             $us = new Usuario("projeto_login", "localhost", "root", "");
            if ($us->cadastrar($nome,$email, $senha)) 
         
         {
            echo "Cadastrado com sucesso!";
         }else

         {
              echo "Email ja esta cadastrado!";
         }

         {
             echo "Senhas não correspondem!";
         }

     }else
     {
         echo "Preencha todos os campos!";
     }
 }
 }
?>
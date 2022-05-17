<?php
    require_once 'CLASSES/usuarios.php';
    session_start();
    if (isset($_SESSION['id_usuario']))
    
    {   $us = new Usuario("projeto_comentarios", "localhost", "root","");
        $informacoes = $us->buscarDadosUser($_SESSION['id_usuario']);
     }elseif(isset($_SESSION['id_master']))
     {
        $us = new Usuario("projeto_comentarios", "localhost", "root","");
        $informacoes = $us->buscarDadosUser($_SESSION['id_master']);
     }
   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>ATIVIDADE DE COMENTÁRIOS</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="CSS/style.css"/>

    </head>
    <body>
    <nav>
<ul>
<?php
    if(isset($_SESSION['id_master']))
    {  ?>

    <li><a href="dados.php">Dados</a></li>

   <?php }
?>
    <li><a href="chat.php"> Chat</a></li>
<?php
    if(isset($informacoes))
     {  
  ?> <li><a href="sair.php">Sair</a></li>   
<?php } 
    else

    { ?>
     <li><a href="entrar.php">Entrar</a></li>
     <?php  }
    ?>
   
</ul>
    </nav>
<h3>Conteudo qualquer</h3>

<?php
if (isset($_SESSION['id_master']) || isset ($_SESSION['id_usuario']))
    ?> <h2>
                <?php
                echo "Olá" ;
                echo $informacoes ['nome'];
                echo " , você esta logado!";
                ?>
     </h2>


    </body>
    </html>
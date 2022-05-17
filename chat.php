<?php
 session_start();
 require_once 'CLASSES/comentarios.php';
    $c = new Comentario("projeto_comentario", "localhost", "root", "");
    $coments = $c->buscarComentarios();
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title> CHAT </title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/chat.css"/>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php"> Inicio</a></li>
            <?php 
                if (isset($_SESSION ['id_master']))
            {?>
            <li><a href="dados.php">Dados</a></li>
            <?php }
            if (isset($_SESSION['id_usuario']) || isset ($_SESSION['id_master']))
            {  ?>
            <li><a href="sair.php">Sair</a></li>
            <?php    }else
                    { ?>
            <li><a href="entrar.php">Entrar</a></li>
<?php   }
    ?>
    </ul>
    </nav>
    <div id="largura-pagina">
        <section id="conteudo1">
                <h1> Chat </h1>
        <h2>Deixe o seu comentário...</h2>
            <form method="POST">
                <img src="images/perfil.png">
                    <textarea name="texto" placeholder="Escreva aqui..." maxlength="400"></textarea>
            <input type="submit" value="PUBLICAR COMENTARIO">
            </form>
            <?php
                if (count($coments) > 0)
                {
                    foreach ($coments as $v)
                    { ?>
            <div class="area-comentario">
            <img src="images/perfil.png">
            <h3><?php echo $v ['nome_pessoa']; ?></h3>
            <h4><?php
                    $data = new DateTime($v['dia']);
                    echo $data->format('d/m/Y');
                    echo " - ";
                    echo $v['horario'];
            ?>
            <a href="">Excluir</h4>
                    <p><?php echo $v ['comentarios']; ?></p>
            </div>
               <?php     }
                }else
                {
                    echo "Ainda não há comentarios por aqui!";
                }
                
            ?>
        
    
    </section>

    <section id="conteudo2">
        <div>
            <img src="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt libero nec justo interdum, nec blandit lectus posuere. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus eget fermentum ex. Mauris sagittis quam est, laoreet fermentum libero consectetur ac. Curabitur id hendrerit mi. Aliquam efficitur aliquet odio, id blandit magna commodo iaculis. Morbi faucibus ultricies lobortis. Quisque pulvinar luctus lorem, at tincidunt nunc porttitor a. Vivamus venenatis varius velit id laoreet. Curabitur ornare risus in commodo finibus. Quisque fermentum dolor et eleifend aliquam. Nam tincidunt gravida nulla at eleifend. In eros sem, dignissim vitae velit egestas, imperdiet suscipit elit. Nulla facilisi. Integer est eros, interdum id ipsum ut, vestibulum venenatis ex. Proin ante nunc, euismod a dictum sit amet, aliquam eu nisl.</p>
</div>
</section>
<section id="conteudo3">
<div>
<h5>Lorem ipsum</h5>
</div>

    </section>

</body>
</html>
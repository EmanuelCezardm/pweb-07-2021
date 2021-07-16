<?php
    include('server.php');
    if(empty($_POST['nick']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    $nick = mysqli_real_escape_string($conn, $_POST['nick']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    //$sql = "SELECT `nomeusuario`, `senha` FROM `usuario` WHERE `nomeusuario`='".$nick."' and `senha`='".md5($senha)."'";

    $sql = "SELECT `nomeusuario`,`senha` FROM `usuario` WHERE `nomeusuario`='".$nick."' and `senha`='".md5($senha)."'";

    $resultado = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($resultado);

    if($count == 1) {
        echo "Login realizado com sucesso";
        header("Location: lista.php");
    }else{
        echo "Usuário ou senha incorretas.";
        ?>
        <button><a href="login.html">Voltar</a></button>
        <?php
    }

    $conn->close();
?>

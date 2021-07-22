<?php
    include('server.php');
    if(empty($_POST['nick']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

    $nick = $_POST['nick'];
    $senha = $_POST['senha'];

    $cmd = $pdo->prepare("SELECT nomeusuario, senha FROM usuario WHERE nomeusuario = :nu and senha = :s");

    $cmd->bindparam(":nu", $nick);
    $cmd->bindValue(":s", md5($senha));
    $cmd->execute();

    if($cmd->rowCount() == 0){
        echo "Usuário ou senha incorreta.";
        ?>
            <button><a href="login.html">Voltar</a></button>
        <?php
    }else{
        header("Location: lista.php");
    }
?>

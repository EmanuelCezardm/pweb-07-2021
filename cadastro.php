<?php
    include('server.php');
    if(empty($_POST['nome']) || empty($_POST['nick']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }

    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $nick = mysqli_real_escape_string($conn, $_POST['nick']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $sql = "INSERT INTO `usuario`(`nome`, `nomeusuario`, `email`, `senha`) VALUES('".$nome."','".$nick."','".$email."','".md5($senha)."')";

    if ($conn->query($sql) === TRUE) {
        header("Location: login.html");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
        ?>
        <button><a href="cadastro.html">Voltar</a></button>
        <?php
    }

    $conn->close();
?>

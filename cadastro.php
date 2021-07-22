<?php
    include('server.php');
    if(empty($_POST['nome']) || empty($_POST['nick']) || empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: cadastro.html');
        exit();
    }

    $nome = $_POST['nome'];
    $nick = $_POST['nick'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $cmd = $pdo->prepare("INSERT INTO usuario(nome, nomeusuario, email, senha) VALUES (:n, :nu, :e, :s)");

    $cmd->bindparam(":n",$nome);
    $cmd->bindparam(":nu",$nick);
    $cmd->bindparam(":e",$email);
    $cmd->bindValue(":s",md5($senha));

    $cmd1 = $pdo->prepare("SELECT nome FROM usuario WHERE nomeusuario = :nu or email = :e");

    $cmd1->bindparam(":nu", $nick);
    $cmd1->bindparam(":e",$email);
    $cmd1->execute();

    if($cmd1->rowCount() == 0){
        $cmd->execute();
        header("Location: login.html");
    }else{
        echo "Usuário já cadastrado."."<br>";
        ?>
            <button><a href="cadastro.html">Voltar</a></button>
        <?php
    }
?>

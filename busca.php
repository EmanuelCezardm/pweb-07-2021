<?php
    include('server.php');

    if(empty($_POST['buscar'])){
        header('Location: lista.php');
        exit();
    }

    $buscar = $_POST['buscar'];

    $cmd = $pdo->prepare("SELECT nomeusuario, email FROM usuario WHERE nomeusuario = :bu or email = :bu");

    $cmd->bindparam(":bu", $buscar);
    $cmd->execute();

    if($cmd->rowCount() == 0){
        echo "Usuário não encontrado.<br>";
    }else{
        $resultado = $cmd->fetch(PDO::FETCH_ASSOC);
        echo "Usuário:<br>";
        foreach ($resultado as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }

    ?>
        <button><a href="lista.php">Voltar</a></button>
    <?php
?>
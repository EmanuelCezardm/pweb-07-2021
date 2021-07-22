<?php
    include('server.php');
    ?>
        <form method="POST" name="form" action="busca.php">
            <br>
            <label for="buscar">Buscar usuário: </label>
            <input type="text" name="buscar">
            <br>
            <button type="submit" value="Send">Buscar</button>
            <br>
            <br>
        </form>
    <?php

    $cmd = $pdo->prepare("SELECT nomeusuario, email FROM usuario");
    $cmd->execute();
    $resultado = $cmd->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($resultado); $i++) { 
        echo "Usuário: ".($i+1)."<br>";
        foreach ($resultado[$i] as $key => $value) {
            echo $key.": ".$value."<br>";
        }
        echo "<br>";
    }
    ?>
        <button><a href="login.html">Voltar</a></button>
    <?php
?>
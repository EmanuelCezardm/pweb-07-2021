<?php
    include('server.php');
    $sql = "SELECT `nome` FROM `usuario`";
    $resultado = $conn->query($sql);

    echo 'Nome dos usuários cadastrados';
    echo '<br/>';

    while($row = $resultado->fetch_array()) {
        echo $row['nome'];
        echo '<br/>';
    }
    ?>
    <button><a href="login.html">Voltar</a></button>
    <?php
?>
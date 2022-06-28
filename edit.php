<?php
    include_once("Conexao.php");

    $bd = new Conexao("localhost", "root", "", "testephp");
    $cn = $bd->getConnect();

    $cod = $_POST["cod"];
    
    $sql = 'select * from beneficios where cod='.$cod;
    $result = $cn->query($sql)->fetch();

    if ($result)
        echo json_encode($result);
?>
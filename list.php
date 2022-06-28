<?php
    include_once("Conexao.php");

    $bd = new Conexao("localhost", "root", "", "testephp");
    $cn = $bd->getConnect();
    
    $sql = 'select * from beneficios';
    $result = $cn->query($sql)->fetchAll();

    if ($result)
        echo json_encode(array("regs" => $result));
?>
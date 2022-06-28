<?php
    include_once("Conexao.php");

    $bd = new Conexao("localhost", "root", "", "testephp");
    $cn = $bd->getConnect();
    
    $sql = $cn->prepare('update beneficios set nome=:no, operadora=:op, tipo_beneficio=:ti, vencto_contrato=:ve where cod=:co');
    $sql->bindParam('no', $_POST["nome"]);
    $sql->bindParam('op', $_POST["operadora"]);
    $sql->bindParam('ti', $_POST["tipo"]);
    $sql->bindParam('ve', $_POST["vencto"]);
    $sql->bindParam('co', $_POST["cod"]);
    
    $result = $sql->execute();

    if ($result)
        echo json_encode(array("status" => 200, "msg" => "Alteração realizada com sucesso!"));
?>
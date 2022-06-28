<?php
    include_once("Conexao.php");

    $bd = new Conexao("localhost", "root", "", "testephp");
    $cn = $bd->getConnect();
    
    $sql = $cn->prepare('delete from beneficios where cod=:co');
    $sql->bindParam('co', $_POST["cod"]);
    
    $result = $sql->execute();

    if ($result)
        echo json_encode(array("status" => 200, "msg" => "Registro deletado com sucesso!"));
?>
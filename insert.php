<?php
    include_once("Conexao.php");

    $bd = new Conexao("localhost", "root", "", "testephp");
    $cn = $bd->getConnect();

    $nome = $_POST["nome"];
    $operadora = $_POST["operadora"];
    $tipo = $_POST["tipo"];
    $vencto = $_POST["vencto"];
    
    $sql = 'INSERT INTO beneficios (cod, nome, operadora, tipo_beneficio, vencto_contrato) VALUES (null, "'.$nome.'", "'.$operadora.'", "'.$tipo.'", "'.$vencto.'")';
    $result = $cn->query($sql);
    $cod = $cn->lastInsertId();

    if ($result)
        echo json_encode(array(
                            "msg" => "Cadastro realizado com sucesso!", 
                            "reg" => array($cod, $nome, $operadora, $tipo, $vencto))
                        );
?>
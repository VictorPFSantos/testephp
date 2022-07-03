<?php
    include_once('../DAO/BeneficiosDAO.php');

    if(isset($_GET["action"])){
        switch($_GET["action"]){
            default:
                listAll();
                break;
        }
    }
    else if(isset($_POST["action"])){
        switch($_POST["action"]){
            case "inserir":
                gravarBeneficio();
                break;
            case "delete":
                apagarBeneficio();
                break;
            default:
            
                break;
        }
    }
    else
        echo "Não houveram parâmetros";

    function listAll(){
        $beneficiosDAO = new BeneficiosDAO();

        $beneficios = $beneficiosDAO->listAll();
        
        if(!is_null($beneficios))
            $res = array("resCod" => 1,"res" => array("msg" => "Registros retornados com sucesso!", "beneficios" => $beneficios));
        else
            $res = array("resCod" => 0,"res" => array("msg" => "Não há nenhum benefício cadastrado no momento.", "beneficios" => null));
            
        echo json_encode($res);
    }

    function gravarBeneficio(){
        $beneficiosDAO = new BeneficiosDAO();

        $id = $beneficiosDAO->store($_POST);

        if(!is_null($id))
            $res = array("resCod" => 1, "res" => array("msg" => "Benefício salvo com sucesso!", "id" => $id));
        else
            $res = array("resCod" => 0, "res" => array("msg" => "Houve um problema ao tentar salvar o benefício!", "id" => null));

        echo json_encode($res);
    }

    function apagarBeneficio(){
        $beneficiosDAO = new BeneficiosDAO();

        $id = $beneficiosDAO->destroy($_POST["id"]);

        if(!is_null($id))
            $res = array("resCod" => 1, "res" => array("msg" => "Benefício salvo com sucesso!", "id" => $id));
        else
            $res = array("resCod" => 0, "res" => array("msg" => "Houve um problema ao tentar salvar o benefício!", "id" => null));

        echo json_encode($res);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <div>
        <label for="">Cod:</label>
        <input type="text" name="cod" id="cod" disabled>
    </div>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="nome" id="nome">
    </div>
    <div>
        <label for="">operadora:</label>
        <input type="text" name="operadora" id="operadora">
    </div>
    <div>
        <label for="">tipo beneficio:</label>
        <input type="text" name="tipo" id="tipo">
    </div>
    <div>
        <label for="">vencimento_contrato:</label>
        <input type="date" name="vencto" id="vencto">
    </div>
    <button id="btnCriar">Salvar</button>
    <button id="btnEditar">Editar</button>
    <table>
        <thead>
            <tr>
                <th>Cod</th>
                <th>Nome</th>
                <th>Operadora</th>
                <th>Tipo Benefício</th>
                <th>Vencimento contrato</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div id="re"></div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="js/index.js"></script>
</body>

</html>
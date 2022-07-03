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
    <div id="fields">
        <input type="hidden" value="" name="cod" id="cod">
        <div>
            <label for="">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="">Operadora:</label>
            <input type="text" name="operadora" id="operadora">
        </div>
        <div>
            <label for="">Tipo de benefício:</label>
            <input type="text" name="tipo" id="tipo">
        </div>
        <div>
            <label for="">Vencimento do contrato:</label>
            <input type="date" name="vencto" id="vencto">
        </div>
    </div>
    
    <button id="salvar">Salvar</button>
    
    <h2>Meus Registros</h2>
    <div id="registros">
        <h4></h4>
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
    </div>

    <div id="re"></div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
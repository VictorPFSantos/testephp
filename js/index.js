$(window).ready(function () {
    let lines = [];

    function apagarRegistro(event) {
        let [btnAction, btnId] = event.target.id.split('_');

        $.post("controller/BeneficiosController.php", {
            action: btnAction,
            id: btnId
        }, res => {
            // console.log(res); return;
            let resp = JSON.parse(res);

            if (resp.resCod) {
                let tr = event.target.parentNode.parentNode;
                let parent = tr.parentNode;
                parent.removeChild(tr);

                if ($("tbody tr").length === 0) {
                    $('#registros h4').css('display', 'block').html('<h4>Não há nenhum benefício cadastrado no momento.<h4>');
                    $('#registros table').css('display', 'none');
                }
            }

            alert(resp.res.msg);
        });
    }

    // SELECT
    $.get('controller/BeneficiosController.php/?action', res => {
        let resp = JSON.parse(res);

        if (!resp.resCod) {
            $('#registros h4').css('display', 'block').html('<h4>' + resp.res.msg + '<h4>');
            $('#registros table').css('display', 'none');
        } else {
            lines = resp.res.beneficios;

            $('tbody').html(lines.map(line => {
                return `
                    <tr>
                        <td>${line.cod}</td>
                        <td>${line.nome}</td>
                        <td>${line.operadora}</td>
                        <td>${line.tipo}</td>
                        <td>${line.vencimento}</td>
                        <td><button class="btnDelete" id="delete_${line.cod}" -data-action="delete_${line.cod}"><ion-icon name="trash-outline"></ion-icon> Apagar Registro</button></td>
                    </tr>
                `;
            }).join(''));

            $("button.btnDelete").on('click', e => apagarRegistro(e));

            $('#registros table').css('display', 'table');
        }
    });

    // INSERT
    $('#salvar').on('click', e => {
        if ($('#nome').val() === "") {
            alert('O campo nome do benefício precisa ser preenchido!');
            return;
        }

        if ($('#operadora').val() === "") {
            alert('O campo operadora do benefício precisa ser preenchido!');
            return;
        }

        if ($('#tipo').val() === "") {
            alert('O campo tipo do benefício precisa ser preenchido!');
            return;
        }

        if ($('#vencto').val() === "") {
            alert('O campo vencto contrato do benefício precisa ser preenchido!');
            return;
        }

        $.post('controller/BeneficiosController.php', {

            action: 'inserir',
            nome: $('#nome').val(),
            operadora: $('#operadora').val(),
            tipo: $('#tipo').val(),
            vencto: $('#vencto').val()

        }, function (res) {
            let resp = JSON.parse(res);

            if (resp.resCod) {
                if ($("tbody tr").length === 0) {
                    $('#registros h4').css('display', 'none');
                    $('#registros table').css('display', 'table');
                }

                $("tbody").append(`
                    <tr>
                        <td>${resp.res.id}</td>
                        <td>${$("#nome").val()}</td>
                        <td>${$("#operadora").val()}</td>
                        <td>${$("#tipo").val()}</td>
                        <td>${$("#vencto").val()}</td>
                        <td><button id="delete_${resp.res.id}" -data-action="delete_${resp.res.id}">Apagar Registro</button></td>
                    </tr>
                `);

                $(`button[-data-action="delete_${resp.res.id}"]`).on('click', e => apagarRegistro(e));
            }

            $('input').val('');

            alert(resp.res.msg);
        });
    })
});
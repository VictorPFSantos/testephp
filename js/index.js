$(window).ready(function () {
    var registros = [];

    $("#btnEditar").on('click', function () {
        $.post("update.php", {
            cod: $("#cod").val(),
            nome: $("#nome").val(),
            operadora: $("#operadora").val(),
            tipo: $("#tipo").val(),
            vencto: $("#vencto").val()
        }, function (res) {
            // console.log(res); return;
            let resp = JSON.parse(res);

            $("input[type=text], input[type=date]").val('');

            alert(resp.msg);

            window.location.reload();

        });
    });

    $.get('list.php', function (res) {
        let resp = JSON.parse(res);
        let lines = "";

        for (reg of resp.regs)
            lines += "<tr>" +
                "<td>" + reg.cod + "</td>" +
                "<td>" + reg.nome + "</td>" +
                "<td>" + reg.operadora + "</td>" +
                "<td>" + reg.tipo_beneficio + "</td>" +
                "<td>" + reg.vencto_contrato + "</td>" +
                "<td><button class='editar' id='editar_" + reg.cod + "'>Editar</button>" +
                "<button class='apagar' id='apagar_" + reg.cod + "'>Apagar</button></td>" +
                "</tr>";

        $("table tbody").html(lines);

        $("button.editar").on('click', function (e) {
            let codReg = e.target.id.split('_')[0];
            // alert(actions);

            $("button.editar").on('click', function (e) {
                let codReg = e.target.id.split('_')[1];

                $.post("edit.php", {
                    cod: codReg,
                }, function (res) {
                    let resp = JSON.parse(res);

                    $("#cod").val(resp.cod);
                    $("#nome").val(resp.nome);
                    $("#operadora").val(resp.operadora);
                    $("#tipo").val(resp.tipo_beneficio);
                    $("#vencto").val(resp.vencto_contrato);

                    $("#btnCriar").css("display", "none");
                    $("#btnEditar").css("display", "block");

                });
            });
        });

        $("button.apagar").on('click', function (e) {
            let codReg = e.target.id.split('_')[1];

            $.post("delete.php", {
                cod: codReg,
            }, function (res) {
                let resp = JSON.parse(res);

                alert(resp.msg);

                $("input[type=text], input[type=date]").val('');
                window.location.reload();

            });
        });
    });



    $("#btnCriar").on("click", function (e) {
        let action = e.target.getAttribute("action");

        if (action == "salvar")


            $.post("insert.php", {
                nome: $("#nome").val(),
                operadora: $("#operadora").val(),
                tipo: $("#tipo").val(),
                vencto: $("#vencto").val()
            }, function (res) {
                var resp = JSON.parse(res);
                let cod = null, line = null;

                line = "<tr>";

                for (let i = 0; i < resp.reg.length; i++) {
                    if (i == 0)
                        cod = resp.reg[i];

                    line += "<td>" + resp.reg[i] + "</td>";
                }

                // for (d of resp.reg)
                //     line += "<td>" + d + "</td>";


                line += "<td><button class='editar' id='editar_" + cod + "'>Editar</button><button class='apagar' id='apagar_" + cod + "'>Apagar</button></td>";
                line += "</tr>";

                $("table tbody").append(line);


                $("input[type=text], input[type=date]").val('');

                let btnsEditar = $("button.editar");

                $("button.editar").on('click', function (e) {
                    let codReg = e.target.id.split('_')[0];
                    // alert(actions);

                    $("button.editar").on('click', function (e) {
                        let codReg = e.target.id.split('_')[1];

                        $.post("edit.php", {
                            cod: codReg,
                        }, function (res) {
                            let resp = JSON.parse(res);

                            $("#cod").val(resp.cod);
                            $("#nome").val(resp.nome);
                            $("#operadora").val(resp.operadora);
                            $("#tipo").val(resp.tipo_beneficio);
                            $("#vencto").val(resp.vencto_contrato);

                            $("#btnCriar").css("display", "none");
                            $("#btnEditar").css("display", "block");

                        });
                    });
                });

                $("button.apagar").on('click', function (e) {
                    let codReg = e.target.id.split('_')[1];

                    $.post("delete.php", {
                        cod: codReg,
                    }, function (res) {
                        let resp = JSON.parse(res);

                        alert(resp.msg);

                        $("input[type=text], input[type=date]").val('');
                        window.location.reload();

                    });
                });

            });
    });

    $()





});
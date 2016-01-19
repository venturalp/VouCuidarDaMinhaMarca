<?php include("header.html") ?>
    <script>
        $(document).ready(function () {
            $('#enviar').click(function () {
                $("#form-contato").submit(enviaDados);
            });
        });

        function enviaDados() {
            $.toast({
                heading: 'Aguarde',
                text: 'Seu email está sendo enviado!',
                icon: 'info',
                hideAfter: false,
                allowToastClose: false,
                position: 'top-center',
                stack: 1
            });

            var dados = {
                op: "contato",
                empresa: $("#empresa").val(),
                nome: $("#nome").val(),
                telefone: $("#telefone").val(),
                email: $("#email").val(),
                cidade: $("#cidade").val(),
                mensagem: $("#mensagem").val()
            };

            jQuery.ajax({
                type: "POST",
                url: "ajax.php",
                data: dados,
                success: function (data) {
                    $.toast().reset('all');
                    if (data == "failed") {
                        $.toast({
                            heading: 'Erro',
                            text: 'Ocorreu um erro ao enviar mensagem, tente novamente!',
                            icon: 'error',

                            position: 'top-center'
                        });
                    } else {
                        $('#form-contato').trigger("reset");
                        $.toast({
                            heading: 'Sucesso!',
                            text: 'Email enviado com sucesso!',
                            icon: 'success',

                            position: 'top-center'
                        });
                    }

                },
                fail: function (data) {
                    $.toast().reset('all');
                    $.toast({
                        heading: 'Erro',
                        text: 'Ocorreu um erro ao enviar mensagem, tente novamente!',
                        icon: 'error',

                        position: 'top-center'
                    });
                }
            });
        }
    </script>
    <section class="contato">
        <div class="contato-container">
            <h2>ENTRE EM CONTATO COM A GENTE.</h2>
            <form class="form-registro redes-form" method="post" onsubmit="return false;" id="form-contato">
                <label for="nome">Nome completo:</label>
                <input type="text" id="nome" required/>
                <label for="email">E-mail:</label>
                <input type="email" id="email" required/>
                <label for="empresa">Nome da empresa:</label>
                <input type="text" id="empresa" required/>
                <div class="inline-form">
                    <label for="ramo">Telefone:
                        <input type="text" id="telefone" required/>
                    </label>

                    <label for="ramo">Cidade/Estado:
                        <input type="text" id="cidade" required/>
                    </label>
                </div>
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem"></textarea>
                <input type="submit" id="enviar" value="ENVIAR" />
            </form>
        </div>
    </section>
    <?php include("footer.html") ?>

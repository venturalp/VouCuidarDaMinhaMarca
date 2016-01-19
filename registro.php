<?php include("header.html") ?>
    <script>
        $(document).ready(function(){
            $('#enviar').click(function () {
                $("#form-reg").submit(enviaDados);
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
                op: "registro",
                nome: $("#nome").val(),
                email: $("#email").val(),
                marca: $("#marca").val(),
                ramo: $("#ramo").val()
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
                            text: 'Ocorreu um erro ao tentar cadastrar, tente novamente!',
                            icon: 'error',

                            position: 'top-center'
                        });
                    } else {
                        $('#form-reg').trigger("reset");
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
    <img class="banner" src="images/banner_registro.jpg" />
    <section class="registro1">
        <p class="cinza">A marca é a cara da empresa. É dela que o seu consumidor vai lembrar quando quiser o seu produto. Mas, e se existirem duas marcas parecidas ou até mesmo iguais? É prejuízo na certa! Seu consumidor pode se confundir e comprar na outra. E pior que isso, dar preferência para ela! Definitivamente, você não quer isso, né?!</p>
    </section>
    <section class="registro2">
        <div class="registro-alerta">
            <p>SEM PROTEÇÃO, SUA MARCA FICA VULNERÁVEL E PODE CONFUNDIR SEU CONSUMIDOR. ISSO NÃO É NADA BOM PARA O SEU NEGÓCIO. </p>
        </div>
    </section>
    <section class="registro3">
        <p>E QUANDO ISSO ACONTECE, O QUE DEVO FAZER?</p>
    </section>
    <section class="registro4">
        <h2>1º SE PREVENIR</h2>
        <p>A sua marca deve ser protegida com o registro no INPI (Instituto Nacional de Propriedade Industrial). Mas não adianta só depositar sua marca lá para ver o que acontece. Ela só estará registrada após um longo processo de registro, que tem que ser acompanhado por mais ou menos 24 meses para garantir que sua marca conseguirá concluir todas as etapas com sucesso.</p>
        <br>
        <br>
        <h2>2º CONTRATAR UMA EMPRESA ESPECIALIZADA.</h2>
        <p>A sua marca deve ser protegida com o registro no INPI (Instituto Nacional de Propriedade Industrial). Mas não adianta só depositar sua marca lá para ver o que acontece. Ela só estará registrada após um longo processo de registro, que tem que ser acompanhado por mais ou menos 24 meses para garantir que sua marca conseguirá concluir todas as etapas com sucesso.</p>
    </section>
    <section class="registro5">
        <div class="reg5-row">
            <div class="reg-block">
                <div><img src="images/icon_lupa.png" /></div>
                <h2>1º PESQUISE SUA MARCA CONOSCO</h2>
                <p>Em 24 horas você receberá um e-mail com seu login e senha, para poder ver o resultado de disponibilidade de registro da sua marca, que será analisado e esclarecido por um de nossos consultores.</p>
            </div>
            <div class="reg-block">
                <div><img src="images/icon_cadeado.png" /></div>
                <h2>2º TENHA LIVRE ACESSO A ÁREA DO CLIENTE</h2>
                <p>Com login e senha você poderá facilmente escolher qual dos nossos planos melhor se encaixa em suas necessidades e seus interesses.</p>
            </div>
        </div>
        <div class="reg5-row">
            <div class="reg-block">
                <div><img src="images/icon_r.png" /></div>
                <h2>3º RECEBA SEU COMPROVANTE</h2>
                <p>Iniciado seu processo de registro, entregamos seu protocolo de marca em no máximo 48 horas após a confirmação do pagamento.</p>
            </div>
            <div class="reg-block">
                <div><img src="images/icon_joia.png" /></div>
                <h2>4º ACESSE SEU PROTOCOLO DE REGISTRO</h2>
                <p>Isso mesmo! Você terá acesso ILIMITADO ao seu processo de registro.</p>
            </div>
        </div>
    </section>
    <section class="registro6">
        <div class="reg6-container">
            <h2>PESQUISE AGORA SUA MARCA!</h2>
            <form id="form-reg" method="post" onsubmit="return false;" class="form-registro">
                <label for="nome">Nome completo:</label>
                <input type="text" id="nome" required/>
                <label for="email">E-mail:</label>
                <input type="email" id="email" required/>
                <label for="marca">Marca que deseja registrar:</label>
                <input type="text" id="marca" required/>
                <label for="ramo">Ramo de atividade:</label>
                <input type="text" id="ramo" required/>
                <input type="submit" id="enviar" value="ENVIAR" />
            </form>
        </div>
    </section>
    <?php include("footer.html") ?>

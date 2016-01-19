<?php include("header.html"); ?>
    <script>
        $(document).ready(function () {
            $('#enviar').click(function () {
                $("#form-logo").submit(enviaDados);
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
                op: "logo",
                quando: $('input[name=quando]:checked', '#form-logo').val(),
                tipo: $('input[name=tipo]:checked', '#form-logo').val(),
                empresa: $("#empresa").val(),
                nome: $("#nome").val(),
                telefone: $("#telefone").val(),
                email: $("#email").val(),
                cidade: $("#cidade").val(),
                porque: $("#porque").val()
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
                        $('#form-logo').trigger("reset");
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


    <img class="banner" src="images/banner_logo.jpg" />
    <section class="logo1">
        <h2 class="cinza">IDENTIDADE VISUAL é o conjunto de elementos que representa a sua empresa. <br>
Confira alguns dos itens que fazem parte:</h2>
        <div class="logo-verde1"></div>
        <div class="logo-verde2">
            <p>A fórmula para o sucesso da sua empresa é simples:</p>
            <img src="images/balao.png" />
        </div>
    </section>
    <div class="faixa-verde-logo">
        <h2>ÓTIMOS PROFISSIONAIS = ÓTIMOS RESULTADOS.</h2></div>
    <section class="logo2">
        <img class="faixa-logo" src="images/faixa-logo.png" />
        <article class="blocos-logo">
            <div class="bloco-roxo">
                <h3>ÚNICO</h3>
                <p>Para diferenciá-lo dos seus concorrentes.</p>
            </div>
            <div class="bloco-vermelho">
                <h3>ADEQUADO</h3>
                <p>Precisa refletir valores e a cultura da sua empresa, bem como os de seu público alvo.</p>
            </div>
            <div class="bloco-laranja">
                <h3>ADAPTÁVEL</h3>
                <p>Tem que permitir a aplicação em diferentes mídias, sempre passando os mesmos conceitos.</p>
            </div>
            <div class="bloco-verde">
                <h3>ATEMPORAL</h3>
                <p>Um bom logo não precisa de modificações. Caso contrário, corre o risco de perder a identificação junto ao consumidor, e ainda demanda mais um grande investimento para comunicar o mercado sobre a mudança.</p>
            </div>
        </article>
        <h2 class="cinza">Sua empresa precisa atingir o seu consumidor com uma marca forte e profissional. E a Vou Cuidar da Minha Marca desenvolve isso para você, ajudando sua marca a crescer mais a cada dia. Você não vai se arrepender.</h2>
    </section>
    <section class="logo3">
        <img src="images/Por-que-a-identidade.png" />
        <h2>Para a formação de uma marca forte e consequentemente, que seja VALORIZADA pelo consumidor. É por isso que a VOU CUIDAR DA MINHA MARCA compreende e se preocupa com a sua empresa. INVISTA NA IDENTIDADE VISUAL DA SUA EMPRESA! Nós acreditamos no seu negócio. E você?</h2>
    </section>
    <section class="logo4">
        <h2 class="cinza">
<strong>IMPORTANTE:</strong> Existem muitos sites, que trabalham com logos pre-definidos, onde você só coloca o seu nome e escolhe a imagem entre diversas opções apresentadas. Mas, para a sua marca ter sucesso, o logotipo tem que ser estudado, planejado e bem executado. E, para isso, você responde um questionário, que se chama briefing, onde colhemos todas as informações necessárias para a criação e o planejamento da sua marca no mercado. Lembre-se: a marca é a identidade da sua empresa, não a trate de qualquer jeito.</h2>
    </section>
    <section class="breafing cinza">
        <h3 class="cinza">RESPONDA AO BRIEFING (FORMULÁRIO) QUE ENTRAREMOS EM CONTATO COM VOCÊ.</h3>
        <form class="form-registro" method="post" onsubmit="return false;" id="form-logo">
            <label for="name">Nome completo:</label>
            <input type="text" id="nome" required/>
            <label for="email">E-mail:</label>
            <input type="email" id="email" required/>
            <label for="empresa">Nome da empresa:</label>
            <input type="text" id="empresa" required/>
            <div class="briefing-div">
                <div>
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" required/>
                    <h3 class="cinza"><strong>INFORMAÇÕES BÁSICAS</strong></h3>
                    <p>Este é um projeto novo ou redesenho?</p>
                    <div class="radiogroup">
                        <input type="radio" name="tipo" value="novo" checked>
                        <label>Projeto novo</label>
                        <input type="radio" name="tipo" value="redesenho">
                        <label>Redesenho</label>
                    </div>
                    <br>
                    <p>Quando precisa do projeto pronto?</p>
                    <div class="radiogroup">
                        <input type="radio" name="quando" value="1 mês" checked>
                        <label>Em 1 mês</label>
                        <input type="radio" name="quando" value="2  meses">
                        <label>Em 2 meses</label>
                    </div>
                    <div class="radiogroup">
                        <input type="radio" name="quando" value="indefinido">
                        <label>Indefinido</label>
                        <input type="radio" name="quando" value="urgente">
                        <label>Urgente</label>
                    </div>
                </div>
                <div>
                    <label for="cidade">Cidade/Estado:</label>
                    <input type="text" id="cidade" required/>
                    <label for="porque">Por que você precisa deste projeto?:</label>
                    <textarea id="porque" required></textarea>
                    <input type="submit" id="enviar" value="ENVIAR" />
                </div>
            </div>
        </form>
    </section>
    <div class="clearfix"></div>
    <?php include("footer.html"); ?>

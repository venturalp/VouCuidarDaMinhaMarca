<?php include("header.html") ?>
<section class="contato">
    <div class="contato-container">
        <h2>ENTRE EM CONTATO COM A GENTE.</h2>
        <form class="form-registro">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" required/>
            <label for="email">E-mail:</label>
            <input type="email" id="email" required/>
            <label for="marca">Marca que deseja registrar:</label>
            <input type="text" id="marca" required/>
            <label for="ramo">Ramo de atividade:</label>
            <input type="text" id="ramo" required/>
        </form>
        <input type="submit" id="enviar" value="ENVIAR" />
    </div>
</section>
<?php include("footer.html") ?>

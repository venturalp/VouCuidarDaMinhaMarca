<?php
if($_POST){
    $to = 'venturalp@gmail.com';

    if ($_POST['op'] == "newsletter")
    {
        $email = $_POST['email'];
        $message = "Email newsletter: " . $email;
        $subject = 'Newsletter - Vou Cuidar da Minha Marca';
        $headers = 'From: Contato<contato@voucuidardaminhamarca.com.br>';


        //send email
        if (mail($to, $subject, $message, $headers))
            echo "Email enviado com sucesso!";
        else
            echo "failed";
    }

    if ($_POST['op'] == "registro")
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $marca = $_POST['marca'];
        $ramo  = $_POST['ramo'];
        $message = "Nome: " . $nome . "\n";
        $message = $message . "Email: " . $email . "\n";
        $message = $message . "Marca: " . $marca . "\n";
        $message = $message . "Ramo: " . $ramo . "\n";


        $subject = 'Registro - Vou Cuidar da Minha Marca';
        $headers = 'From: Contato<contato@voucuidardaminhamarca.com.br>';


        //send email
        if (mail($to, $subject, $message, $headers))
            echo "Email enviado com sucesso!";
        else
            echo "failed";
    }

    if ($_POST['op'] == "logo" || $_POST['op'] == "web")
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $empresa = $_POST['empresa'];
        $cidade  = $_POST['cidade'];
        $telefone  = $_POST['telefone'];
        $tipo  = $_POST['tipo'];
        $quando  = $_POST['quando'];
        $porque  = $_POST['porque'];


        $message = "Nome: " . $nome . "\n";
        $message = $message ."Email: " . $email . "\n";
        $message = $message ."Empresa: " . $empresa . "\n";
        $message = $message ."Telefone: " . $telefone . "\n";
        $message = $message ."Cidade/Estado: " . $cidade . "\n";
        $message = $message ."Quando? " . $quando . "\n";
        $message = $message ."Tipo? " . $tipo . "\n";
        $message = $message . "Mensagem: " . $porque . "\n";

        $subject = ($_POST['op'] == "logo")?'Logo - Vou Cuidar da Minha Marca':'Web - Vou Cuidar da Minha Marca';
        $headers = 'From: Contato<contato@voucuidardaminhamarca.com.br>';


        //send email
        if (mail($to, $subject, $message, $headers))
            echo "Email enviado com sucesso!";
        else
            echo "failed";
    }

    if ($_POST['op'] == "contato")
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $empresa = $_POST['empresa'];
        $cidade  = $_POST['cidade'];
        $telefone  = $_POST['telefone'];
        $mensagem  = $_POST['mensagem'];


        $message = "Nome: " . $nome . "\n";
        $message = "Email: " . $email . "\n";
        $message = "Empresa: " . $empresa . "\n";
        $message = "Telefone: " . $telefone . "\n";
        $message = "Cidade/Estado: " . $cidade . "\n";
        $message = $message . "Mensagem: " . $mensagem . "\n";

        $subject = 'Contato - Vou Cuidar da Minha Marca';
        $headers = 'From: Contato<contato@voucuidardaminhamarca.com.br>';

        //send email
        if (mail($to, $subject, $message, $headers))
            echo "Email enviado com sucesso!";
        else
            echo "failed";
    }

    if ($_POST['op'] == "redes")
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $empresa = $_POST['empresa'];
        $cidade  = $_POST['cidade'];
        $telefone  = $_POST['telefone'];
        $como  = $_POST['como'];


        $message = "Nome: " . $nome . "\n";
        $message = $message ."Email: " . $email . "\n";
        $message = $message ."Empresa: " . $empresa . "\n";
        $message = $message ."Telefone: " . $telefone . "\n";
        $message = $message ."Cidade/Estado: " . $cidade . "\n";
        $message = $message . "Mensagem: " . $como . "\n";

        $subject = 'Redes Sociais - Vou Cuidar da Minha Marca';
        $headers = 'From: Contato<contato@voucuidardaminhamarca.com.br>';


        //send email
        if (mail($to, $subject, $message, $headers))
            echo "Email enviado com sucesso!";
        else
            echo "failed";
    }
}
else{
    return "failed";
}
?>

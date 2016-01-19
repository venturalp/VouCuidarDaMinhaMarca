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
}
else{
    return "failed";
}
?>

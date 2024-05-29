<?php
require_once 'abastecimento.class.php';
$ab = new Abastecimento_class();
$ab->setLitros($_POST['litros']);
$ab->setIdVeiculo($_POST['id_veiculo']);
$ab->setHodometro($_POST['hodometro']);
$ab->setData($_POST['data']);
if (isset($_POST["tanque_completo"]['sim'])) {
    $ab->setTanqueCompleto(true);
    $ab->calcularMedia();
} else {
    $ab->setTanqueCompleto(false);
    $ab->setHodometro(0);
    $ab->setMedia(0);
}
$ab->inserirAbastecimento();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H2>Sucexo!</H2>
    <p>Abastecimento salvo com exito</p>
    <a href="index.php">Voltar</a>
</body>
</html>
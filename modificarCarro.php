<?php
require_once "veiculos.class.php";
$veiculo = new Veiculos_class($_GET['id_veiculo']);

$veiculo->setMarca($_POST['marca']);
$veiculo->setModelo($_POST['modelo']);
$veiculo->setAno($_POST['ano']);
$veiculo->setPlaca($_POST['placa']);

$veiculo->editarVeiculo();
$id_veiculo = $veiculo->getIdVeiculo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículo editado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <h2>Sucesso!</h2>
    <p>Seu veículo foi editado</p>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>

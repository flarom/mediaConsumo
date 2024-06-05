<?php
require_once "veiculos.class.php";
$id_veiculo = $_GET['id_veiculo'];
$veiculo = new Veiculos_class($id_veiculo);

$marca = $veiculo->getMarca();
$modelo = $veiculo->getModelo();
$ano = $veiculo->getAno();
$placa = $veiculo->getPlaca();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Modificar carro</h2>
    <a href="index.php">Voltar</a>
    <hr>
    <form action="modificarCarro.php?id_veiculo=<?php echo $id_veiculo?>" method="POST">
        <label for="marca">Marca</label>
        <br>
        <input type="text" name="marca" value="<?php echo $marca?>">
        <br>
        <label for="modelo">Modelo</label>
        <br>
        <input type="text" name="modelo" value="<?php echo $modelo?>">
        <br>
        <label for="ano">Ano</label>
        <br>
        <input type="number" name="ano" value="<?php echo $ano?>">
        <br>
        <label for="placa">Placa</label>
        <br>
        <input type="text" name="placa" value="<?php echo $placa?>">
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>
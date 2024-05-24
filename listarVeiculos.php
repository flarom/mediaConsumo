<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
<?php
require_once "veiculos.class.php";


$veiculo = new Veiculos_class;
$veiculos = $veiculo->listarVeiculos();


foreach ($veiculos as $v) { 
    ?>
<div>
    <p>Veiculo</p>
    <br>
    <td><?php echo "Código: " . $v['id_veiculo'] . "<br>"; ?></td>
    <td><?php echo "Marca: " . $v['marca'] . "<br>"; ?></td>
    <td><?php echo "Modelo: " . $v['modelo'] . "<br>"; ?></td>
    <td><?php echo "Ano: " . $v['ano'] . "<br>"; ?></td>
    <td><?php echo "Placa: " . $v['placa'] . "<br>"; ?></td>
    <td><?php echo "Kilometragem ".$v['km']."<br>"; ?></td>
    <button><a href="abastecer.php?id_veiculo=<?php echo $v['id_veiculo']; ?>">Abastecer</a></button>
    <p>---------------------------------------------</p>
</div>
    <?php
}

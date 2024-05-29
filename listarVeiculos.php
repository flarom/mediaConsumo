<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Medias</h2>
    <a href="carros.html">Cadastrar veículo</a>
    <hr>
    <p>Veículos:</p>
</body>

</html>
<?php
require_once "veiculos.class.php";
require_once "abastecimento.class.php";


$veiculo = new Veiculos_class;
$veiculos = $veiculo->listarVeiculos();
// print_r($veiculos);
// exit();

foreach ($veiculos as $v) {
    ?>
    <table>
        <tr>
            <th>Código</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Ano</th>
            <th>Placa</th>
            <th>Kilometragem</th>
            <th>Media</th>
            <th></th>
        </tr>
        <tr>
        <td><?php echo $v->getIdVeiculo(); ?></td>
        <td><?php echo $v->getMarca(); ?></td>
        <td><?php echo $v->getModelo(); ?></td>
        <td><?php echo $v->getAno(); ?></td>
        <td><?php echo $v->getPlaca(); ?></td>
        <td><?php echo $v->getHodometro(); ?></td>
        <td><?php echo $v->getMedia(); ?></td>
        <td><a href="abastecer.php?id_veiculo=<?php echo $v->getIdVeiculo(); ?>">Abastecer</a></td>
        </tr>
    </table>
    
    <?php
}

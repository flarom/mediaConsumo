<?php
require_once "abastecimento.class.php";

$id_veiculo = $_GET['id_veiculo'];

$abastecimento = new Abastecimento_class();
$abastecimentos = $abastecimento->listarAbastecimentos($id_veiculo);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Histórico</h2>
    <a href="index.php">Voltar</a>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Hodometro</th>
                <th>Media</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($abastecimentos as $ab) {
                ?>
                <tr>
                    <td><?php echo $ab['id_abastecimento']; ?></td>
                    <td><?php echo $ab['hodometro']; ?></td>
                    <td><?php echo $ab['media']; ?></td>
                    <td><?php echo $ab['data']; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>

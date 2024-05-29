<?php
require_once "veiculos.class.php";
$veiculo = new Veiculos_class;
$veiculo->setMarca($_POST['marca']);
$veiculo->setModelo($_POST['modelo']);
$veiculo->setAno($_POST['ano']);
$veiculo->setPlaca($_POST['placa']);

$veiculo->inserirVeiculo();
$id_veiculo = $veiculo->getIdVeiculo();

?>
<h2>Sucesso!</h2>
<p>Seu veículo foi cadastrado</p>
<br>
<a href="abastecer.php?id_veiculo=<?php echo $veiculo->getIdVeiculo(); ?>">Abastecer</a>

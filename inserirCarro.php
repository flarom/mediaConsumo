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
<h1>Sucesso !</h1>
<p>Seu carro foi cadastrado</p>
<br>
<button><a href="carros.html">Voltar</a></button>

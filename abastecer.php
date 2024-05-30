<?php
require_once "abastecimento.class.php";
$abastecimento = new Abastecimento_class;
$id_veiculo = $_GET['id_veiculo'];
$abastecimento->setIdVeiculo($id_veiculo);
?>

<h2>Abastecer</h2>
<a href="index.php">Voltar</a>
<hr>
<form action="inserirAbastecimento.php" method="POST">
    <link rel="stylesheet" href="style.css">
    <input type ="hidden" name ='id_veiculo' value = '<?php echo $id_veiculo; ?>'>
    <label for="litros">Litros Abastecidos</label>
    <br>
    <input type="number" name="litros">
   
    <br>
    <label for="tanque_completo">Tanque completo </label>
    <input type="checkbox" value="true" name="tanque_completo[sim]">
    <br>
    <label for="hodometro">Hodômetro</label>
    <br>
    <input type="number" name="hodometro" value='<?php echo $abastecimento->buscarKM()->hodometro;?>' min='<?php echo $abastecimento->buscarKM()->hodometro;?>'>
    <br>
    <label for="data">Data</label>
    <br>
    <input type="date" name="data">
    <br>
    <br>
    <input type="submit" value="Enviar">
</form>

</body>
</html>
<?php
$id_veiculo = $_GET['id_veiculo'];
?>
<form action="inserirAbastecimento.php" method="POST">
    <link rel="stylesheet" href="style.css">
    <input type ="hidden" name ='id_veiculo' value = '<?php echo $id_veiculo; ?>'>
    <label for="litros">Litros Abastecidos</label>
    <br>
    <input type="number" name="litros" min="30" max="60">
   
    <br>
    <label for="tanque_completo">Tanque completo </label>
    <input type="checkbox" value="true" name="tanque_completo[sim]">
    <br>
    <label for="hodometro">Hodômetro</label>
    <br>
    <input type="number" name="hodometro">
    <br>
    <label for="data">Data</label>
    <br>
    <input type="date" name="data">
    <br>
    <input type="submit" value="Enviar">
</form>

</body>
</html>
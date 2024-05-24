<?php
require_once "conexao.class.php"; 
class Veiculos_class{
    private $id_veiculo;
    private $marca;
    private $modelo;
    private $ano;
    private $placa;

    public function getIdVeiculo() {
        return $this->id_veiculo;
    }

    public function setIdVeiculo($id_veiculo) {
        $this->id_veiculo = $id_veiculo;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getAno() {
        return $this->ano;
    }

    public function setAno($ano) {
        $this->ano = $ano;
    }

    public function getPlaca() {
        return $this->placa;
    }

    public function setPlaca($placa) {
        $this->placa = $placa;
    }

    function inserirVeiculo()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "INSERT INTO veiculo (marca, modelo, ano, placa) VALUES (:marca, :modelo, :ano, :placa)";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":marca", $this->marca);
            $stmt->bindParam(":modelo", $this->modelo);
            $stmt->bindParam(":ano", $this->ano);
            $stmt->bindParam(":placa",$this->placa);
            $stmt->execute();
            $this->id_veiculo = $db->lastInsertId(); // Definindo o ID do veículo após a inserção
            echo "DEU BOM";
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir pessoa: " . $e->getMessage();
            return false;
        }
    }
    function listarVeiculos()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "SELECT *, (SELECT hodometro from abastecimento WHERE abastecimento.id_veiculo = veiculo.id_veiculo order by id_abastecimento DESC LIMIT 1) as km FROM veiculo";

        try {
            $stmt = $db->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo "deu bom"; // Apenas para verificação, você pode remover isso depois
            return $result;
        } catch (PDOException $e) {
            echo 'Erro ao listar veículos:' . $e->getMessage();
            $result = [];
            return $result;
        }
    }  
}
?>

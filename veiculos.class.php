<?php
require_once "conexao.class.php";
require_once "abastecimento.class.php";
class Veiculos_class
{
    private $id_veiculo;
    private $marca;
    private $modelo;
    private $ano;
    private $placa;
    private $abastecimentos;
    private $hodometro;

    public function getIdVeiculo()
    {
        return $this->id_veiculo;
    }

    public function setIdVeiculo($id_veiculo)
    {
        $this->id_veiculo = $id_veiculo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }
    public function getHodometro()
    {
        return $this->hodometro;
    }
    public function setHodometro($hodometro)
    {
        $this->hodometro = $hodometro;
    }
    public function getMedia()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "SELECT media FROM abastecimento WHERE id_veiculo = :id_veiculo ORDER BY id_abastecimento DESC LIMIT 1";

        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_veiculo", $this->id_veiculo);
            $stmt->execute();
            return $stmt->fetchObject()->media;
        } catch (PDOException $e) {
            echo "Erro ao b uscar a media " . $e->getMessage();
            exit();
        } catch (Exception $e) {
            exit();
        }
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
            $stmt->bindParam(":placa", $this->placa);
            $stmt->execute();
            $this->id_veiculo = $db->lastInsertId(); // Definindo o ID do veículo após a inserção
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir veiculo: " . $e->getMessage();
            return false;
        }
    }
    function editarVeiculo(){
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "UPDATE veiculo SET marca=:marca, modelo=:modelo, ano=:ano, placa=:placa where id_veiculo = :id_veiculo";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_veiculo", $this->id_veiculo);
            $stmt->bindParam(":marca", $this->marca);
            $stmt->bindParam(":modelo", $this->modelo);
            $stmt->bindParam(":ano", $this->ano);
            $stmt->bindParam(":placa", $this->placa);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao editar veiculo: " . $e->getMessage();
            return false;
        }
    }
    function listarVeiculos()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "SELECT *, (SELECT hodometro from abastecimento WHERE abastecimento.id_veiculo = veiculo.id_veiculo order by id_abastecimento DESC LIMIT 1) as hodometro FROM veiculo";

        try {
            $stmt = $db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Veiculos_class");
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo 'Erro ao listar veículos:' . $e->getMessage();
            $result = [];
            return $result;
        }
    }
    function __construct($id_veiculo = null)
    {
        if (!empty($id_veiculo)) {
            $database = new Conexao();
            $db = $database->getConnection();

            $sql = "SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo";

            try {
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':id_veiculo', $id_veiculo);
                $stmt->execute();
                $db_veiculo = $stmt->fetchObject();

                $this->setIdVeiculo($db_veiculo->id_veiculo);
                $this->setMarca($db_veiculo->marca);
                $this->setModelo($db_veiculo->modelo);
                $this->setAno($db_veiculo->ano);
                $this->setPlaca($db_veiculo->placa);

            } catch (PDOException $e) {
                echo 'Erro ao listar autos: ' . $e->getMessage();
            }
        }
    }
}
?>
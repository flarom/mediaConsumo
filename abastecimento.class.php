<?php 
require_once "conexao.class.php";
class Abastecimento_class{
    private $id_abastecimento;
    private $id_veiculo;
    private $litros;
    private $tanque_completo;
    private $hodometro;
    private $data;
    private $media;

    public function getIdAbastecimento() {
        return $this->id_abastecimento;
    }

    public function setIdAbastecimento($id_abastecimento) {
        $this->id_abastecimento = $id_abastecimento;
    }

    public function getIdVeiculo() {
        return $this->id_veiculo;
    }

    public function setIdVeiculo($id_veiculo) {
        $this->id_veiculo = $id_veiculo;
    }

    public function getLitros() {
        return $this->litros;
    }

    public function setLitros($litros) {
        $this->litros = $litros;
    }

    public function getTanqueCompleto() {
        return $this->tanque_completo;
    }

    public function setTanqueCompleto($tanque_completo) {
        $this->tanque_completo = $tanque_completo;
    }

    public function getHodometro() {
        return $this->hodometro;
    }

    public function setHodometro($hodometro) {
        $this->hodometro = $hodometro;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getMedia() {
        return $this->media;
    }

    public function setMedia($media) {
        
        $this->media = $media;
    }

    
  
    public function inserirAbastecimento()
    {
        $database = new Conexao();
        $db = $database->getConnection();

        $sql = "INSERT INTO abastecimento (id_veiculo, litros, tanque_completo, hodometro, data, media) VALUES (:id_veiculo, :litros, :tanque_completo, :hodometro, :data, :media)";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_veiculo", $this->id_veiculo);
            $stmt->bindParam(":litros", $this->litros);
            $stmt->bindParam(":tanque_completo", $this->tanque_completo);
            $stmt->bindParam(":hodometro", $this->hodometro);
            $stmt->bindParam(":data", $this->data);
            $stmt->bindParam(":media", $this->media);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao inserir abastecimento: " . $e->getMessage();
            return false;
        }
    }
    public function calcularMedia(){
        $anterior = $this->buscarKM();
        $kilometragem = $this->hodometro - $anterior->hodometro;
        $media = $kilometragem/$this->litros;
        $this->setMedia($media);
    }
    public function buscarKM(){
        $database = new Conexao();
        $db = $database->getConnection();
        $sql = "SELECT * FROM abastecimento WHERE id_veiculo = :id_veiculo ORDER BY id_abastecimento DESC LIMIT 1";
    
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id_veiculo", $this->id_veiculo);
            $stmt->execute();
            return $stmt->fetchObject();
            
        } catch (PDOException $e) {
            echo "Erro ao buscar abastecimento " . $e->getMessage();
            exit();
        }
    }
}


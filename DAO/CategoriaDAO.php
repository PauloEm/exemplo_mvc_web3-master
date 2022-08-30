<?php

use App\model\CategoriaModel;
use \PDO;
class CategoriaDAO
{
    private $conexao;

    function __construct() 
    {
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
    }

    function insert(CategoriaModel $model) 
    {
        $sql = "INSERT INTO categoria 
                (descricao) 
                VALUES (?)";

$stmt = $this->conexao->prepare($sql);

$stmt->bindValue(1, $model->descricao);

$stmt->execute();      
}
public function update(CategoriaModel $model )
{
    $sql = "update categoria SET descricao=? WHERE id=?";

    $stmt = $this->conexao->prepare($sql);
         $stmt->bindValue(1, $model->descricao);
         $stmt->bindValue(8, $model->id);

         $stmt->execute(); 

        }   
        public function select()
        {
            $sql = "SELECT * FROM categoria ";
    
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_CLASS);        
        }

        public function selectById(int $id)
        {
            include_once 'Model/CategoriaModel.php';
    
            $sql = "SELECT * FROM categoria WHERE id = ?";
    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
    
            return $stmt->fetchObject("CategoriaModel"); 
        }

        public function delete(int $id)
        {
            $sql = "DELETE FROM categoria WHERE id = ? ";
    
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
        }
    }
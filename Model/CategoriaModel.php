<?php

namespace App\Model;
use App\DAO\CategoriaDAO;


class CategoriaModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $descricao;

    public $rows;

    public function save()
    {
        include 'DAO/CategoriaDAO.php';

        $dao = new CategoriaDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
        if(empty($this->id)) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
           $dao->update($this);
        }
    }
    public function getAllRows()
    {
        include 'DAO/CategoriaDAO.php';
    
        $dao =new CategoriaDAO();
    
        $this->rows = $dao->select();
    }

    public function GetByid(int $id)
{
    include 'Dao/CategoriaDao.php';

    $dao = new CategoriaDAO();

    $obj = $dao->selectById($id);

    return($obj) ? $obj : new CategoriaModel();
}
public function delete(int $id)
{
    include'DAO/CategoriaDAO.php';

    $dao = new CategoriaDAO();

    $dao->delete($id);
}

}
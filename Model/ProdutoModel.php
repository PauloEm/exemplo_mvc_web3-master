<?php

class ProdutoModel
{
    /**
     * Declaração das propriedades conforme campos da tabela no banco de dados.
     */
    public $id, $nome, $categoria, $descricao;
    public $data_entrada, $fornecedor;
    public $estoque_min, $codigo;

    /**
     * Armazena o array vindo da DAO com todos os itens vindo da tabela.
     */
    public $rows;


    /**
     * Declaração do método save que chamará a DAO para gravar no banco de dados
     * o model preenchido.
     */
    public function save()
    {
        include 'DAO/ProdutoDAO.php';

        $dao = new ProdutoDAO();

        // Se id for nulo, significa que trata-se de um novo registro
        // caso contrário, é um update poque a chave primária já existe.
        if($this->id == null) 
        {
            // No que estamos enviado o proprio objeto model para o insert, por isso do this
            $dao->insert($this);
        } else {
            // update
        }
    }

    /**
     * Retorna todos os registros.
     */
    public function getAllRows()
    {
        // incluindo o arquivo ProdutoDAO.php
        include 'DAO/ProdutoDAO.php';

        // Instanciando a classe ProdutoDAO
        $dao = new ProdutoDAO();

        // Obtendo todos os registros vindos de getAllRows e guardando
        // na propriedade $rows
        $this->rows = $dao->getAllRows();
    }
}
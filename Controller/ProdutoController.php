<?php

class ProdutoController
{
    /**
     * index será usada para devolver uma View.
     */
    public static function index()
    {
        include 'Model/ProdutoModel.php';
        $model = new ProdutoModel();
        $model->getAllRows();
        
        include 'View/modules/Produto/ProdutoListar.php';
    }
/**
     * Devolve uma View com um formulário para o usuário.
     */
    public static function form()
    {
        include 'View/modules/Produto/ProdutoCadastro.php';
    }
/**
     * Preenche um Model para que o banco de dados salve.
     */
    public static function save() {

        include 'Model/ProdutoModel.php';

        $produto = new ProdutoModel();
        $produto-> nome = $_POST['nome'];
        $produto-> descricao = $_POST['descricao'];
        $produto-> codigo = $_POST['codigo'];
        $produto-> estoque_min = $_POST['estoque_min'];
        $produto-> categoria = $_POST['categoria'];
        $produto-> data_entrada = $_POST['data_entrada'];
        $produto-> fornecedor = $_POST['fornecedor'];

        $produto->save(); // chama o método save da model.

        header("Location: /produto"); // redireciona o usuário para outra rota.
    }
}
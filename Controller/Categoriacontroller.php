<?php

namespace App\Controller;

use App\Model\CategoriaModel;


class CategoriaController 
{
    public static function index() 
    {
        include 'Model/CategoriaModel.php';

        $model = new CategoriaModel();
        $model->getAllRows();

        include 'View/modules/Categoria/ListaCategoria.php';
    }

    public static function form()
    {
       include 'Model/CategoriaModel.php';
       $model =new CategoriaModel();

       if(isset($_GET['id']))
       $model = $model->getById( (int) $_GET['id']);

        include 'View/modules/Categoria/FormCategoria.php';
    }

    public static function save() {

        include 'Model/CategoriaModel.php'; 
        $categoria = new CategoriaModel();
        $categoria->id = $_POST['id'];
        $categoria->nome = $_POST['descricao'];

        $categoria->save();

        header("Location: /categoria");

    }
    public static function delete()
    {
        include 'Model/CategoriaModel.php';

        $categoria = new CategoriaModel();

        $categoria->delete( (int) $_GET['id'] );

        header("Location: /categoria");

    }
   
}
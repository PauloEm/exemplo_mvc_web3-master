<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//$uri_parse:analisa o URI da instância para garantir que tenha todas as partes necessárias para ser um URI válido.

//echo $uri_parse;
//echo "<hr />";

include 'Controller/PessoaController.php';
//include: inclui na pasta/caminho controller e dentro da pessoa/produto controller

switch($uri_parse)
{
    case '/pessoa':
        PessoaController::index();
    break;

    case '/pessoa/form':
        PessoaController::form();
    break;

    case '/pessoa/save':
        PessoaController::save();
    break;
    
    //switch: botão que é usado para alternar entre estados ativados e desativados.
    //case: condição que define o código a ser executado com base em uma comparação de valores.
    //break: utilizado para especificar a última linha de código a ser executada dentro da condição.
    
    case '/formulario':
        include 'View/udy.php';
    break;

    case '/processa':
        echo "vai pegar o que o usuário digitou <br />";
        echo $_POST['nome'];
        echo "<br />";
        var_dump($_POST);
    break;

    case '/produto':
        ProdutoController::index();
    break;

    case '/produto/form':
        ProdutoController::form();
    break;

    case '/produto/delete':
        echo "remover produto";
    break;

    case '/produto/save':
        ProdutoController::save();
    break;

    default:
        echo "erro 404";
    break;
}
<?php

spl_autoload_register(function($classe_buscada)
{
    $arquivo_controller = "controller/" . $classe_buscada . ".php";
    $arquivo_model = "model/" . $classe_buscada . ".php";
    $arquivo_dao ="DAO/" . $classe_buscada . ".php";

    if(file_exists($arquivo_controller))
    include $arquivo_controller;
    else if(file_exists($arquivo_model))
    include $arquivo_model;
    else if(file_exists($arquivo_dao))
    include $arquivo_dao;

    echo "foi buscar a classe:" . $classe_buscada;
    echo '<hr />';

});
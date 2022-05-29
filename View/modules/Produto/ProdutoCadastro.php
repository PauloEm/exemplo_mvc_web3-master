<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <style>
        label, input { display: block;}
    </style>
</head>
<body>
    <form action="/produto/save" method="post">
        <fieldset>
            <legend>Cadastro de Produto</legend>
            <label for="nome">Nome:</label>
            <input name="nome" id="nome" type="text" />

            <label for="categoria">Categoria:</label>
            <input name="categoria" id="categoria" type="text" />

            <label for="descricao">Descrição:</label>
            <input name="descricao" id="descricao" type="text" />

            <label for="data_entrada">Data Entrada:</label>
            <input name="data_entrada" id="data_entrada" type="date" />

            <label for="codigo">Código:</label>
            <input name="codigo" id="codigo" type="text" />

            <label for="fornecedor">Fornecedor:</label>
            <input name="fornecedor" id="fornecedor" type="text" />

            <label for="estoque_min">Estoque Mínimo:</label>
            <input name="estoque_min" id="estoque_min" type="text" />

            <button type="submit">Enviar</button>

        </fieldset>
    </form>    
</body>
</html>
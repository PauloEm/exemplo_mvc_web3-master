<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Produtos</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>categoria</th>
        </tr>

        <?php

            //foreach: instruções para cada elemento
            // em instância
            //endforeach: fecha essas instruções 

        ?>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['nome'] ?></td>
            <td><?= $item['cpf'] ?></td>
        </tr>
        <?php endforeach ?>    

    </table>
</body>
</html>
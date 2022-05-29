<?php
/**
 * As classes DAO (Data Access Object) são responsáveis por executar os
 * SQL junto ao banco de dados.
 */
class ProdutoDAO
{
    /**
     * Atributo (ou Propriedade) da classe destinado a armazenar o link (vínculo aberto)
     * de conexão com o banco de dados.
     */
    private $conexao;


    /**
     * Método construtor, sempre chamado na classe quando a classe é instanciada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new ProdutoDAO();
     * Neste caso, assim que é instânciado, abre uma conexão com o MySQL (Banco de dados)
     * A conexão é aberta via PDO (PHP Data Object) que é um recurso da linguagem para
     * acesso a diversos SGBDs.
     */
    function __construct() 
    {
        // DSN (Data Source Name) onde o servidor MySQL será encontrado
        // (host) em qual porta o MySQL está operado e qual o nome do banco pretendido. 
        $dsn = "mysql:host=localhost:3307;dbname=db_sistema";
        $user = "root";
        $pass = "etecjau";
        
        // Criando a conexão e armazenado na propriedade definida para tal.
        $this->conexao = new PDO($dsn, $user, $pass);
    }


    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    function insert(ProdutoModel $model) 
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare   
        $sql = "INSERT INTO produto 
                (nome, codigo, descricao, data_entrada, fornecedor, categoria, estoque_min) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Declaração da variável stmt que conterá a montagem da consulta. Observe que
        // estamos acessando o método prepare dentro da propriedade que guarda a conexão
        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
        $stmt = $this->conexao->prepare($sql);

        // Nesta etapa os bindValue são responsáveis por receber um valor e trocar em uma 
        // determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos
        // via seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->codigo);
        $stmt->bindValue(3, $model->descricao);
        $stmt->bindValue(4, $model->data_entrada);
        $stmt->bindValue(5, $model->fornecedor);
        $stmt->bindValue(6, $model->categoria);
        $stmt->bindValue(7, $model->estoque_min);
        
        // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();      
    }

    /**
     * Retorna todas as linhas de uma tabela no bancod e dados.
     */
    public function getAllRows()
    {
        // Instrução SQL a ser consultada no banco de dados.
        $sql = "SELECT id, nome, categoria FROM produto ";

        // Preparando o SQL para ser executado.
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute(); // Executando a SQL preparada.

        // Retornando todas as linhas obtidas na consulta.
        // É retornado um array associativo, uma estrutura
        // chave-valor, por exemplo:
        // array( 
        //        array('id' => 1, 'nome' => 'Rapha'), 
        //        array('id' => 3, 'nome' => 'Portugal') 
        //      )
        return $stmt->fetchAll(); 
    }
}
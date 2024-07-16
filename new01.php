<?php
// Configurações do banco de dados
$host = 'clicknewss.mysql.dbaas.com.br'; // ou o IP do seu servidor de banco de dados
$dbname = 'clicknewss';
$username = 'clicknewss';
$password = 'Adz658951!';

try {
    // Cria a instância PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    //$id = $_GET["id"];
    //$valor = $id;    

    $cat = $_GET["cat"];
    //$cat = $cat;

    $cat = "policial";
    // Configura o modo de erro do PDO para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Escreve a consulta SQL
    $sql = "SELECT * FROM noticias WHERE cat = :cat";
    //$sql = "SELECT * FROM noticias WHERE cat = 'policial'";

    // Prepara a consulta
    $stmt = $pdo->prepare($sql);

    // Bind do valor do parâmetro
    //$cat = $_GET["cat"];
    //$valor = 'algum_valor';
    $stmt->bindParam(':cat', $cat, PDO::PARAM_STR);

    // Executa a consulta
    $stmt->execute();

    // Busca todos os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Exibe os resultados
    foreach ($resultados as $linha) {
        echo 'ID: ' . $linha['id'] . '<br>';
        echo 'Titulo: ' . $linha['titulo'] . '<br>';
        // Adicione outros campos conforme necessário
        echo '<hr>';
    }

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
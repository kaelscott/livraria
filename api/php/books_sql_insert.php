<?php
include ("./includes/connection.php");

// Sua chave de API do Google Books
$apiKey = 'AIzaSyA30Tkewx10hPtRo_owpvVr3kLZOu0EGmI';

// Termo de pesquisa (por exemplo, "javascript")
$searchTerm = 'jogosvorazes';

// URL da API do Google Books
$url = "https://www.googleapis.com/books/v1/volumes?q={$searchTerm}&key={$apiKey}";

// Requisição para a API
$response = file_get_contents($url);

// Decodifica a resposta JSON
$data = json_decode($response, true);

// Verifica se há resultados
if ($data && array_key_exists('items', $data)) {
    foreach ($data['items'] as $item) {
        $title = $conn->real_escape_string($item['volumeInfo']['title']);
        $author = $conn->real_escape_string($item['volumeInfo']['authors'][0]);
        $publishedDate = $conn->real_escape_string($item['volumeInfo']['publishedDate']);
        $description = $conn->real_escape_string($item['volumeInfo']['description']);
        $isbn = isset($item['volumeInfo']['industryIdentifiers'][0]['identifier']) ? $item['volumeInfo']['industryIdentifiers'][1]['identifier'] : null;
        $category = $conn->real_escape_string($item['volumeInfo']['categories'][0]);
        $thumbnail = isset($item['volumeInfo']['imageLinks']['thumbnail']) ? $conn->real_escape_string($item['volumeInfo']['imageLinks']['thumbnail']) : null;


        // Verifica se o livro já existe no banco de dados
        if (isset($item['volumeInfo']['imageLinks']['thumbnail']) and isset($item['volumeInfo']['categories'][0])) {
            $thumbnail = $conn->real_escape_string($item['volumeInfo']['imageLinks']['thumbnail']);
            $category = $conn->real_escape_string($item['volumeInfo']['categories'][0]);
            // Verifica se o livro já existe no banco de dados
            $sql = "SELECT * FROM livro WHERE titulo = '$title' AND autor = '$author' AND data_publicacao = '$publishedDate'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "O livro ${title} já existe. <br>";
            } else {
                // Insere os dados no banco de dados
                $sql = "INSERT INTO livro (titulo, autor, data_publicacao, descricao, isbn, categoria, thumbnail) VALUES ('$title', '$author', '$publishedDate', '$description', '$isbn', '$category', '$thumbnail')";
                if ($conn->query($sql) === TRUE) {
                    echo "${title} inserido com sucesso. <br>";
                } else {
                    echo "Erro ao inserir registro: " . $conn->error;
                }
            }
        } else {
            echo "O livro ${title} não tem uma miniatura ou categoria e não será salvo. <br>";
        }
    }
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
?>

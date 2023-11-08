<?php

include("./views/includes/connection.php");

$apiKey = 'AIzaSyA30Tkewx10hPtRo_owpvVr3kLZOu0EGmI';
// %20 - espaço
$searchTerm = 'senhor%20dos%20aneis';
$url = "https://www.googleapis.com/books/v1/volumes?q={$searchTerm}&key={$apiKey}";

// $authorName = 'Dan%20Brown';
// $url = "https://www.googleapis.com/books/v1/volumes?q=inauthor:{$authorName}&key={$apiKey}";

$response = file_get_contents($url);
$data = json_decode($response, true);

if ($data && array_key_exists('items', $data)) {
    foreach ($data['items'] as $item) {
        $title = $conn->real_escape_string($item['volumeInfo']['title']);
        $author = array_key_exists('authors', $item['volumeInfo']) ? $conn->real_escape_string($item['volumeInfo']['authors'][0]) : null;
        $publishedDate = isset($item['volumeInfo']['publishedDate']) ? $conn->real_escape_string($item['volumeInfo']['publishedDate']) : null;
        $description = isset($item['volumeInfo']['description']) ? $conn->real_escape_string($item['volumeInfo']['description']) : null;
        $category = isset($item['volumeInfo']['categories'][0]) ? $conn->real_escape_string($item['volumeInfo']['categories'][0]) : null;
        $price = isset($item['saleInfo']['listPrice']['amount']) ? $conn->real_escape_string($item['saleInfo']['listPrice']['amount']) : null;
        $isbn = isset($item['volumeInfo']['industryIdentifiers'][1]['identifier']) ? $item['volumeInfo']['industryIdentifiers'][1]['identifier'] : null;
        $thumbnail = isset($item['volumeInfo']['imageLinks']['thumbnail']) ? $conn->real_escape_string($item['volumeInfo']['imageLinks']['thumbnail']) : null;

        if (
            isset($item['volumeInfo']['title']) &&
            isset($item['volumeInfo']['authors'][0]) &&
            isset($item['volumeInfo']['publishedDate']) &&
            isset($item['volumeInfo']['description']) &&
            isset($item['volumeInfo']['categories'][0]) &&
            isset($item['saleInfo']['listPrice']['amount']) &&
            isset($item['volumeInfo']['industryIdentifiers'][1]['identifier']) &&
            isset($item['volumeInfo']['imageLinks']['thumbnail'])
        ) {
            $thumbnail = $conn->real_escape_string($item['volumeInfo']['imageLinks']['thumbnail']);
            $category = $conn->real_escape_string($item['volumeInfo']['categories'][0]);
            $sql = "SELECT * FROM livro WHERE titulo = '$title' AND autor = '$author' AND data_publicacao = '$publishedDate'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "O livro ${title} já existe. <br>";
            } else {
                $sql = "INSERT INTO livro (titulo, autor, data_publicacao, descricao, categoria, preco, isbn, thumbnail) VALUES ('$title', '$author', '$publishedDate', '$description', '$category', '$price', '$isbn','$thumbnail')";

                if ($conn->query($sql) === TRUE) {
                    echo "${title} inserido com sucesso. <br>";
                } else {
                    echo "Erro ao inserir registro: " . $conn->error;
                }
            }
        } else {
            echo "O livro ${title} não tem todas as informações necessárias e não será salvo. <br>";
        }
    }
} else {
    echo "Nenhum resultado encontrado.";
}

$conn->close();
?>

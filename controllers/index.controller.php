<?php
$pesquisar = $_REQUEST['pesquisar'] ?? '';

$livros = $database->query(
    query: "SELECT * FROM livros WHERE titulo LIKE :filtro",
    class: Livro::class,
    params: ['filtro' => "%$pesquisar%"]
)->fetchAll();


view('index', compact('livros'));
<?php

$livro = $database->query(
    query: "SELECT * FROM livros where id = :id",
    class: Livro::class,
    params: ["id" => $_GET['id']]
)->fetch();

view('livro', compact('livro'));

<?php

$livro = Livro::get($_GET['id']);

$avaliacoes = $database->query(
    query: "SELECT * FROM avaliacoes a JOIN usuarios u on u.id = a.usuario_id WHERE livro_id = :id",
    class: Avaliacao::class,
    params:['id' => $_GET['id']]
)->fetchAll();

view('livro', compact('livro','avaliacoes'));
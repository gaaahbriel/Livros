<?php

$livro = $database->query(
    query: "SELECT
        l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento,
        round(sum(a.nota) / 5.0) as nota_avaliacao, count(a.id) as count_avaliacoes
    FROM 
        livros l
    LEFT JOIN 
        avaliacoes a on a.livro_id = l.id
    WHERE 
        l.id = :id
    GROUP BY 
        l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento
    ",
    class: Livro::class,
    params: ["id" => $_GET['id']]
)->fetch();

$avaliacoes = $database->query(
    query: "SELECT * FROM avaliacoes a JOIN usuarios u on u.id = a.usuario_id WHERE livro_id = :id",
    class: Avaliacao::class,
    params:['id' => $_GET['id']]
)->fetchAll();

view('livro', compact('livro','avaliacoes'));

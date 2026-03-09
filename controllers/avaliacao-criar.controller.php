<?php

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location: /');
    exit();
}

$usuario_id = $_SESSION['auth'];


$database->query(
    "INSERT INTO avaliacoes (usuario_id, livro_id, avaliacao, nota)
    VALUES (:usuario_id, :livro_id, :avaliacao, :nota)",
    params: compact('usuario_id', 'livro_id', 'avalicao', 'nota')
    
    );

    flash()->push('mensagem', 'avaliação criada com sucesso');
    header('location: /livro?id='.$livro_id);
    exit();
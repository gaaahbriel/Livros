<?php

if(!auth()){
    header('location: /');
    exit();
}

$livros = Livro::myBooks(auth()->id);

view('meus-livros', compact('livros'));
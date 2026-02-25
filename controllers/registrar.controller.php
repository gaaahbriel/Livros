<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $validacoes = [];

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $email_confirmacao = $_POST['email_confirmacao'];
        $senha = $_POST['senha'];

        if(strlen($nome) == 0){
            $validacoes [] = 'O nome é obrigatorio';
        }

        if(strlen($email) == 0){
            $validacoes [] = 'O Email é obrigatorio';
        }

        if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
            $validacoes [] = 'O email é invalido';
        }

        if($email != $email_confirmacao){
            $validacoes [] = 'O email de confirmação está diferente';
        }

        if(strlen($senha) == 0){
            $validacoes [] = 'A senha é obrigatorio';
        }
        
        if(strlen($senha) < 8 || strlen($senha) > 30){
            $validacoes [] = 'A senha tem que ter entre 8 e 30 caracteres';
        }

        if(! str_contains($senha, '$')){
            $validacoes [] = 'É obrigatorio um $ na senha';
        }

        if(sizeof($validacoes) > 0){
            $_SESSION['validacoes'] = $validacoes;
            header('location: /login');
            exit();
        }
        
        
        

        $database->query(
        query: "INSERT INTO usuarios (nome, email, senha) values (:nome, :email, :senha)",
        params: [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'senha' => $_POST['senha']
        ]
        );

        header('location: /login?mensagem=Registrado com sucesso');
        exit();
    }



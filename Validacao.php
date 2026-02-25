<?php

/**
        $validacao = Validacao::validar([
            'nome' => 'required',
            'email' => ['required', 'email', 'confirmed'],
            'senha' => ['required', 'min:8', 'max:30', 'strong']
        ], $_POST);

        if($validao->naoPassou()){
            $_SESSION['validacoes'] = $validacao->validacoes;
            header('location: /login');
            exit();
        }

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
 **/

class Validacao
{
    public $validacoes;

    public static function validar($regras, $dados)
    {
        $validacao = new self;

        foreach ($regras as $campo => $regrasDoCampo) {
            foreach ($regrasDoCampo as $regra) {
                $valorDoCampo = $dados[$campo];
                if ($regra == 'confirmed') {
                    $validacao->$regra($campo, $valorDoCampo, $dados["{$campo}_confirmacao"]);
                } else {
                    $validacao->$regra($campo, $valorDoCampo);
                }
            }
        }

        return $validacao;
    }

    private function required($campo, $valor)
    {
        if (strlen($valor) == 0) {
            $this->validacoes[] = "O $campo é obrigatorio";
        }
    }

    private function email($campo, $valor)
    {
        if (! filter_var($valor, FILTER_VALIDATE_EMAIL)) {
            $this->validacoes[] = "O $campo é invalido.";
        }
    }

    private function confirmed($campo, $valor, $valorDeConfirmacao)
    {
        if ($valor != $valorDeConfirmacao) {
            $this->validacoes[] = "O $campo está diferente.";
        }
    }

    public function naoPassou(){
        return sizeof($this->validacoes)  > 0;
    }
}

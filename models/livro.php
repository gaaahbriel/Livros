<?php
class Livro
{
    public $id;
    public $titulo;
    public $autor;
    public $descricao;
    public $ano_de_lancamento;
    public $usuario_id;
    public $nota_avaliacao;
    public $count_avaliacoes;

    public function query($query, $params)
    {
        $database = new Database(config('database'));

        return $database->query("SELECT
            l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento
            , ifnull(round(sum(a.nota) / 5.0), 0) as nota_avaliacao
            , ifnull(count(a.id), 0) as count_avaliacoes
        FROM
        livros l
        LEFT JOIN 
        avaliacoes a on a.livro_id = l.id
        WHERE 
        $query
        GROUP BY 
        l.id, l.titulo, l.autor, l.descricao, l.ano_de_lancamento
        ", self::class, $params);
    }

    public static function get($id)
    {
        return (new self)->query('l.id = :id', ['id' => $id])->fetch();
    }

    public static function all($filtro)
    {
        return (new self)->query('titulo like :filtro', ['filtro' => "%$filtro%"])->fetchAll();
    }

    public static function myBooks($usuario_id)
    {
        return (new self)->query('l.usuario_id = :usuario_id', ['usuario_id' => $usuario_id])->fetchAll();
    }
}

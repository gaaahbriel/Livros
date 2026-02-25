<?php
class Database
{
    private $db;

    public function __construct($config)
    {
        $driver = $config['driver'];
        unset($config['driver']);
        $dsn = $driver . ":" . http_build_query($config, '', ';');
        

        $this->db = new PDO($dsn);
    }

    public function query($query, $class = null, $params = []){
        $prepare = $this->db->prepare($query);

        if($class){
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        $prepare->execute($params);

        return $prepare;
    }
}

$database = new Database($config['database']);

/* 
    *@return array[Livro] 

    public function livros($pesquisa = null)
    {
        $prepare = $this->db->prepare("SELECT * FROM livros WHERE autor LIKE :pesquisa OR titulo LIKE :pesquisa OR autor LIKE :pesquisa ");
        $prepare->bindValue(':pesquisa', "%$pesquisa%");
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function livro($id)
    {
        $prepare = $this->db->prepare("SELECT * FROM livros WHERE id = :id");
        $prepare->bindValue(':id', $id);
        $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
        $prepare->execute();

        return $prepare->fetch();
    }
 */
<?php


class QueryBuilder {

    public $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table) {
        $query = $this->pdo->prepare("select * from {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);

}

    public function insert($table, $parameters) {

        $keys = implode(', ',array_keys($parameters));
        $values = ':' . implode(', :', array_keys($parameters));
        $sql = "INSERT INTO {$table} ($keys) VALUES ($values)";

        try {
            $query = $this->pdo->prepare($sql);
            $query->execute($parameters);
        }catch (Exception $e) {
            die('something went wrong!');
        }

    }


}
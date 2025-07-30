<?php

class Database
{
    protected PDO $connection;

    public function __construct(array $config, string $username = 'root', string $password = 'Yehtetaung@2481998')
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}
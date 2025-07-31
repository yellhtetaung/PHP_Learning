<?php

class Database
{
    protected PDO $connection;
    protected PDOStatement $statement;

    public function __construct(array $config, string $username = 'root', string $password = 'Yehtetaung@2481998')
    {
        $dsn = "mysql:" . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function get(): array|bool
    {
        return $this->statement->fetchAll();
    }

    public function find(): array|bool
    {
        return $this->statement->fetch();
    }

    public function findOrFail(): array
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }

        return $result;
    }
}

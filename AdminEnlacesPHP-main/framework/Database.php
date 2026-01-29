<?php

class Database
{
    private $connection;
    private $statement;

    public function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $dbname = 'links_db';
        $user = 'root';
        $password = ''; // XAMPP por defecto

        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        try {
            $this->connection = new PDO($dsn, $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function firstOrFail()
    {
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            http_response_code(404);
            exit('404 Not Found');
        }
        return $result;
    }
}

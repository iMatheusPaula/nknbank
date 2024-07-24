<?php

namespace Source;

use PDO;

class MySQL
{
    private string $HOST = "192.168.5.206";
    private string $USER = 'root';
    private string $PASSWORD = 'root';
    private string $DATABASE = 'nkn_bank';
    protected PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->HOST;dbname=$this->DATABASE", $this->USER, $this->PASSWORD);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}

<?php

class DatabaseAccess
{
    private ?PDO $connection = null;

    public function __construct()
    {

    }

    /**
     * @return PDO|null
     */
    public function getConnection(): ?PDO
    {
        if ($this->connection === null) {
            $this->setConnection();
        }

        return $this->connection;
    }

    private function setConnection()
    {
        //Obviously in production would make sure this information was secure.
        $serverName = "127.0.0.1";
        $dbName = "sweatwater_main";
        $username = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$serverName;dbname=$dbName", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}
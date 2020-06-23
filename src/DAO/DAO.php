<?php


namespace App\DAO;

use PDO;
use Exception;


class DAO
{
    private $connection;

    private function checkConnection()
    {
        if($this->connection === null) {
            return $this->getConnection();
        }
        return $this->connection;
    }

    public function getConnection()
    {
        try{
            $this->connection = new PDO('mysql:host=localhost;dbname=resto_test;charset=utf8', 'root', '' );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->connection;
        }

        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }

    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->checkConnection()->query($sql);
        return $result;
    }
}
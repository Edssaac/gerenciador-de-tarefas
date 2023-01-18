<?php

class Conexao
{
    private $host = 'localhost';
    private $db_name = 'php_pdo';
    private $user = 'root';
    private $password = '';

    public function conectar()
    {
        try {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->db_name",
                "$this->user",
                "$this->password"
            );

            return $conexao;
        } catch (PDOException $e) {
            echo "<pre>";
            print_r($e->getMessage());
            echo "</pre>";
        }
    }
}

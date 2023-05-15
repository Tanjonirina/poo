<?php
class DB
{
    private $pdo;
    protected $host ="localhost";
    protected $dbname="produits";
    protected $username ="root";
    protected $password ="";

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password,[PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_OBJ]);
        } catch (PDOException $th) {
            //throw $th;
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }
}
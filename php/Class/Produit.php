<?php
require "DB.php";
class Produit
{
    public $designation;
    public $prix;
    public $nombre;
    protected $table ="products";

    public function create(){
        $pdo = new DB();
        $data = $pdo->getPdo()->prepare("INSERT INTO {$this->table} (nom,prix,stock) VALUES(?,?,?)");
        $data->execute([$this->designation,$this->prix,$this->nombre]);
    }

    public function all()
    {
        $pdo = new DB();
        $data = $pdo->getPdo()->query("SELECT * FROM {$this->table}");
        return $data->fetchAll();
    }

    public function updateStock($id,$stock)
    {
        $pdo = new DB();
        $data =$pdo->getPdo()->prepare("UPDATE  {$this->table} SET stock=? where id = ? ");
        $data->execute([$stock,$id]);
    }

    public function getproduit($id)
    {
        $pdo = new DB();
        $data = $pdo->getPdo()->query("SELECT * FROM {$this->table} WHERE id = {$id}");
        return $data->fetch();
    }
}
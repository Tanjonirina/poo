<?php
class Facture
{
    public $ID_Produit;
    public $nombre_achat;
    public $prix_HT;

    public function create()
    {
        $pdo = new DB();
        $data = $pdo->getPdo()->prepare("INSERT INTO factures(ID_produit,nombre_Achat,prix_HT) VALUES(?,?,?)");
        $data->execute([$this->ID_Produit,$this->nombre_achat,$this->prix_HT]);
    }

    public function all()
    {
        $pdo = new DB();
        $data = $pdo->getPdo()->query("SELECT p.nom, p.prix, f.nombre_Achat, f.prix_HT  FROM factures f INNER JOIN products p ON f.ID_produit = p.ID");
        return $data->fetchAll();
    }
}
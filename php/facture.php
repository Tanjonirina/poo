<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap@5.0.0-alpha2.min.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        require "Class/DB.php";
        require "Class/Facture.php";
        require "Class/Somme.php";
        $obj= new Facture();
        $obj1 = new Somme();
        $data = $obj->all();
        $prix_Total = 0;

        ?>
        <div class="container">
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-3"></div>
               <div class="col-md-3"></div>
               <div class="col-md-3">
               <a href="ajout.php" class="btn btn-info">Ajouter</a>
               </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">designation</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Prix unitaire</th>
                            <th scope="col">Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php foreach($data as $key=>$value):?>
                        <?php 
                            $prix_Total+=$value->prix_HT;
                        ?>
                        <tr>
                            <th scope="row"><?= $key + 1?></th>
                            <td><?= $value->nom?></td>
                            <td><?= $value->nombre_Achat;?></td>
                            <td><?= $value->prix?></td>
                            <td><?= $value->prix_HT?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <h1>TOTAL: <?= $prix_Total;?></h1>
                </div>
                <div class="col-md-3">
                <?php

                    $ttc = $prix_Total + ($prix_Total * 0.2);
                    Somme::$ttc = $ttc;
                ?>
                    <h1>TTC:<?= $ttc;?> </h1>
                </div>
                <div class="col-md-3">
                    <h6>TTC avec Remise:<?= Somme::ttcr();?> </h6>
                </div>
                <div class="col-md-3">
                    <h1>Somme à payé: <?= Somme::somme($prix_Total);?></h1>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
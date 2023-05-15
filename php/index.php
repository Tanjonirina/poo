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
        <div class="container">
            <?php if(isset($_GET["error"])):?>
                <div class="alert alert-danger" role="alert">
                    <span><?= $_GET["error"];?></span>
                </div>
             <?php endif;?>
             <?php if(isset($_GET["message"])):?>
                <div class="alert alert-success" role="alert">
                    <span><?= $_GET["message"];?></span>
                </div>
             <?php endif;?>
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-3"></div>
               <div class="col-md-3"></div>
               <div class="col-md-3">
               <a href="ajout.php" class="btn btn-info">Ajouter</a>
               </div>
            </div>
            <?php
                require "Class/Produit.php";
                $obj = new Produit();
                $data = $obj->all()

            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">designation</th>
                            <th scope="col">prix</th>
                            <th scope="col">stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key => $value):?>
                        <tr>
                            <th scope="row"><?= $value->id; ?></th>
                            <td><?= $value->nom;?></td>
                            <td><?= $value->prix;?></td>
                            <td><?= $value->stock;?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php
               require "Class/Facture.php";
                if(isset($_POST['numero']) && isset($_POST["nombre"])){
                    if(!empty($_POST['numero']) && !empty($_POST['nombre'])){
                        $data1 = $obj->getproduit($_POST['numero']);
                        if($data1->stock > 0 && $_POST['nombre'] <= $data1->stock ){
                            $obj1 = new Facture();
                            $obj1->ID_Produit = $_POST['numero'];
                            $obj1->nombre_achat= $_POST['nombre'];
                            $data1 = $obj->getproduit($_POST['numero']);
                            $obj1->prix_HT = $data1->prix * $_POST['nombre'];
                            $obj1->create();
                            $stock = $data1->stock -  $_POST['nombre'];
                            $obj->updateStock($_POST['numero'],$stock);
                            header("location:index.php?message=success");
                        }else{
                            header("location:index.php?error=Erreur nombre de stock depassé!");
                        }
                        
                    }
                }
            ?>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="numero" id="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="nombre" id="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-info" >Commander</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
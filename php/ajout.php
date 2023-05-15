<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap@5.0.0-alpha2.min.css">
    <title>Ajout</title>
</head>
<body>
    <main>
        <div class="container">
            <?php 
            require "Class/Produit.php";
                if(isset($_POST["produit"] ) && isset($_POST["prix"] ) && isset($_POST["nombre"] )){
                    if(!empty($_POST["produit"] ) && !empty($_POST["prix"] ) && !empty($_POST["nombre"] )){
                        $data = new Produit();
                        $data->designation = $_POST["produit"];
                        $data->prix = $_POST["prix"] ;
                        $data->nombre = $_POST["nombre"];
                        $data->create(); 
                    }
                }
            ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Nom produit</label>
                    <input type="text" class="form-control" name="produit">
                </div>
                <div class="form-group">
                    <label for="">Prix</label>
                    <input type="text" class="form-control" name="prix">
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="row py-3">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">sauvegarder</button>
                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                    <div class="col-md-3"></div>
                   
                </div>
            </form>
        </div>
    </main>
</body>
</html>
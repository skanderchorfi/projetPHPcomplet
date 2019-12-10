<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Gestion des Vehicules</title>
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Liste des vehicules</h3>
        </div>
        <?php if (isset($_GET['notif'])): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    if ($_GET['notif'] == 'add') echo 'Vehicule ajouté avec succés';
            
                ?>
            </div>
        <?php endif ?>
        <br>
        <a href="create.php" class="btn btn-primary">Nouveau client</a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>vid</th>
                    <th>status</th>
                    <th>num_v</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'classes/vehicule.class.php';
                    $vehicule = new Vehicule;
                    $listVehicules = $vehicule->readAllVehicules();
                    $data = $listVehicules->fetchAll();
                    foreach($data as $vehiculeData):
                    ?>
                        <tr>
                          
                            <td><?= $vehiculeData['vid'] ?></td> 
                            <td><?= $vehiculeData['status'] ?></td>   
                            <td><?= $vehiculeData['num_v'] ?></td>   
                          
                           
                        </tr>
                    <?php endforeach  ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

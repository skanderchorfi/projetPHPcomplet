<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Nouveau client</title>
</head>
<body>
    <?php
        if (!empty($_POST)) {
            include './classes/vehicule.class.php';
            $vehicule = new Vehicule;
            $vehicule->addNewVehicule($_POST['vid'], $_POST['status'], $_POST['num_v']);
            header('Location: index.php?notif=add');
            exit();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Ajouter un nouveau vehicule</h3>
        </div>
        <fieldset>
            <legend>Nouveau vehicule</legend>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">vid</label>
                            <input type="text" required name="vid" class="form-control" id="vid">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">status</label>
                            <input type="text" required name="status" class="form-control" id="status">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateN">num vehicule</label>
                            <input type="text" required name="num_v" class="form-control" id="num_v">
                        </div>
                    </div>

                </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>
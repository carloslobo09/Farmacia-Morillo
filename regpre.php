<?php
ob_start();
?>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css2/all.min.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>Profesores</title>
</head>

<body>
    <?Php
    include "presentacion.php";
    if (isset($_GET["id_pre"])) {
        $id_pre = $_GET["id_pre"];
        $pre = new presentacion("");
        $pre->getbyId($id_pre);
        $nombre = $pre->getnombre();
    } else {
        $nombre = "";
        $id_pre = 0;
    }
    if (
        isset($_POST["nombre"]) &&
        isset($_POST["id_pre"])
    ) {
        $id_pre = $_POST["id_pre"];
        $nombre = $_POST["nombre"];
        $objeto = new presentacion($nombre);
        $objeto->conectar();
        $objeto->creartb();
        if ($id_pre == 0) {
            echo $objeto->guardar();
            header("Location:http://localhost:8080/Farmacia/listpre.php");
            ob_end_flush();
            exit;
        } else {
            echo $objeto->modificar($id_pre);
            header("Location:http://localhost:8080/Farmacia/listpre.php");
        }
    }
    ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" style="font-size:17px;">Farmacia | Coronel Juan Solá</a>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="listins.php">Insumos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listpre.php">Presentacion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <form name="tuformulario" method="post" action="regpre.php" align="center">
                    <br><h4 class="letrabl">Registro</h4><br>
                    <div class="form-group">
                        <input type="text" name="nombre" class="form-control" aria-describedby="emailHelp" placeholder="Nombre" value="<?PHP echo $nombre ?>">
                        <br>
                        <input type="hidden" class="form-control" name="id_pre" aria-describedby="emailHelp" value="<?PHP echo $id_pre ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-guardar-ins">Guardar</button>
                    <a href="listpre.php" class="btn btn-outline-primary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="op1.js"></script>
    <script src="op2.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/AjaxForms.js"></script>
    <script src="js/sweetalert2.min.js"></script>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/source_lines.js"></script>
    <script src="plugins/jtable/jquery-ui.js" type="text/javascript"></script>
    <script src="plugins/jtable/jquery.jtable.js" type="text/javascript"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v4.0"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>
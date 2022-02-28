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
    include "insumos.php";
    if (isset($_GET["id_ins"])) {
        $id_ins = $_GET["id_ins"];
        $ins = new insumos("", "", "", "", "", "", "", "", "", "", "");
        $ins->getbyId($id_ins);
        $id_pre = $ins->getid_pre();
        $nombre = $ins->getnombre();
        $stocki = $ins->getstocki();
        $stockf = $ins->getstockf();
        $csl = $ins->getcsl();
        $clearr = $ins->getclearr();
        $ue = $ins->getue();
        $clears = $ins->getclears();
        $noapt = $ins->getnoapt();
        $otras = $ins->getotras();
        $consumom = $ins->getconsumom();
        $cslentr = "";
        $cl = "";
    }

    if (
        isset($_POST["id_pre"]) &&
        isset($_POST["nombre"]) &&
        isset($_POST["stocki"]) &&
        isset($_POST["stockf"]) &&
        isset($_POST["csl"]) &&
        isset($_POST["clearr"]) &&
        isset($_POST["ue"]) &&
        isset($_POST["clears"]) &&
        isset($_POST["noapt"]) &&
        isset($_POST["otras"]) &&
        isset($_POST["consumom"]) &&
        isset($_POST["cslentr"]) &&
        isset($_POST["cl"]) &&
        isset($_POST["id_ins"])
    ) {
        $cslentr = $_POST["cslentr"];
        $cl = $_POST["cl"];
        $id_pre = $_POST["id_pre"];
        $id_ins = $_POST["id_ins"];
        $nombre = $_POST["nombre"];
        $stocki = $_POST["stocki"];
        $stockf = $_POST["stockf"];
        $csl = $_POST["csl"];
        $clearr = $_POST["clearr"];
        $ue = $_POST["ue"];
        $clears = $_POST["clears"];
        $noapt = $_POST["noapt"];
        $otras = $_POST["otras"];
        $consumom = $_POST["consumom"];
        $objeto = new insumos($id_pre, $nombre, $stocki, $stockf, $csl, $clearr, $ue, $clears, $noapt, $otras, $consumom);
        $objeto->conectar();
        $objeto->creartb();
        echo $objeto->agregar($id_ins, $cslentr, $cl);
        header("Location:http://localhost:8080/Farmacia/listins.php");
    }
    ?>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" style="font-size:17px; color:black;">Farmacia | Coronel Juan Solá</a>
        </li>
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
                <form name="tuformulario" method="post" action="agregar.php" align="center">
                    <br>
                    <h4 class="letrabl">Unidades a Entregar</h4><br>
                    <div class="form-group">
                        <input type="hidden" name="id_pre" class="form-control" placeholder="Nombre" value="<?PHP echo $id_pre ?>">

                        <input type="hidden" name="nombre" class="form-control" placeholder="Nombre" value="<?PHP echo $nombre ?>">

                        <input type="hidden" name="stocki" class="form-control" placeholder="Stock Inicial(Solo números)" value="<?PHP echo $stocki ?>">

                        <input type="hidden" name="stockf" class="form-control" placeholder="Stock Final" value="<?PHP echo $stockf ?>">

                        <input type="hidden" name="csl" class="form-control" placeholder="C.S.L." value="<?PHP echo $csl ?>">

                        <input type="number" required name="cslentr" class="form-control" placeholder="Unidades Ingresantes por C.S.L" value="<?PHP echo $cslentr ?>">
                        <br>
                        <input type="number" required name="cl" class="form-control" placeholder="Unidades Ingresantes por Clearing" value="<?PHP echo $cl ?>">

                        <input type="hidden" name="clearr" class="form-control" placeholder="Clearing INGRESANTE" value="<?PHP echo $clearr ?>">

                        <input type="hidden" name="ue" class="form-control" placeholder="Unidades Entregadas" value="<?PHP echo $ue ?>">

                        <input type="hidden" name="clears" class="form-control" placeholder="Clearing SALINTE" value="<?PHP echo $clears ?>">

                        <input type="hidden" name="noapt" class="form-control" placeholder="No Apto" value="<?PHP echo $noapt ?>">

                        <input type="hidden" name="otras" class="form-control" placeholder="Otras" value="<?PHP echo $otras ?>">

                        <input type="hidden" required name="consumom" class="form-control" placeholder="Consumo Promedio Mensual(Solo números)" value="<?PHP echo $consumom ?>">
                        <br>
                        <input type="hidden" class="form-control" name="id_ins" value="<?PHP echo $id_ins ?>" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-guardar-ins">Guardar</button>
                    <a href="listins.php" class="btn btn-outline-primary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

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
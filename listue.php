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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profesores</title>
    <style>
        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: aquamarine;
        }
    </style>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" style="font-size:17px;">Farmacia | Coronel Juan Solá</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="listins.php">Insumos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listpre.php">Presentacion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="listue.php">Día a día</a>
        </li>

    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <br>
                <h4 class="letrabl" align="center">Lista de unidades entregadas en el día</h4><br>
                <?Php
                include "insumos.php";
                $con = new conexion();
                $conn = new mysqli(
                    $con->getservername(),
                    $con->getusername(),
                    $con->getpassword(),
                    $con->getdbname()
                );
                $conn->set_charset("utf8");
                date_default_timezone_set('America/Buenos_Aires');
                $fechaactual = date('Y-m-d');
                $sql = "SELECT ue.*, sum(unide) as suma,insumos.nombre,now() as actual FROM ue INNER JOIN insumos ON insumos.id_ins=ue.id_ins where fecha='" . $fechaactual . "' GROUP BY id_ins ORDER BY nombre asc ";
                $result = $conn->query($sql);
                echo "<table  class='table table-striped table-sm table-hover'>
                        <thead><tr style='background-color:black;color:white;'>
                        <th scope='col'><center>Nombre</center></th>
                        <th scope='col'><center>Unidades Entregadas</center></th>
                        <th scope='col'><center>Fecha</center></th>
                        </tr></thead><tbody id='myTable'>";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td><center>" . $row["nombre"] . "</center></td>
                            <td><center>" . $row["suma"] . "</center></td>
                            <td><center>" . $row["fecha"] . "</center></td>
                            </tr>";
                    }
                }
                echo "</tbody></table>";

                $conn->close();
                ?>
                <br><center><a href="createexcel2.php" class="btn btn-success">Planilla excel del día&nbsp;<i class="fas fa-file-pdf-o"></i></a></center><br><br>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
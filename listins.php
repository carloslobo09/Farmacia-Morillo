<?php
ob_start();
?>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css2/all.min.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>FARMACIA- HOSPITAL MORILLO</title>
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
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Reiniciar Mes</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="mes.php">¡Hacerlo!</a>
            </div>
        </li>
    </ul>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br>
                <h4 class="letrabl" align="center">Lista de Insumos</h4>
                <br>
                <a style="position:absolute; top:21px;" class="btn btn-outline-primary" href="regins.php">Agregar nuevo Insumo</a>
                <div class="busqueda">
                    <input class="form-control" style="position:absolute; width:300px; top:21px; left:950px;" id="myInput" type="text" placeholder="Ingrese los valores a buscar" style="width:300px;height:30px">
                </div>
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
                $sql = "SELECT insumos.*,insumos.nombre as nombrei,presentacion.nombre as nombrep, presentacion.* FROM insumos INNER JOIN presentacion ON presentacion.id_pre=insumos.id_pre ORDER BY nombrei asc";
                $result = $conn->query($sql);
                echo "<table  class='table table-striped table-sm table-hover'>
                        <thead style='background-color:black;color:white;'><tr>
                        <th scope='col'><center>Nombre</center></th>
                        <th scope='col'><center>Clasificacion</center></th>
                        <th scope='col'><center>Stock Inicial</center></th>
                        <th scope='col'><center>C.S.L.</center></th>
                        <th scope='col'><center>Clearing(Ingresante)</center></th>
                        <th scope='col'><center>Unidades Entregadas</center></th>
                        <th scope='col'><center>Clearing(Saliente)</center></th>
                        <th scope='col'><center>No Aptos</center></th>
                        <th scope='col'><center>Otras</center></th>
                        <th scope='col'><center>Consumo Mensual</center></th>
                        <th scope='col'><center>Stock Final</center></th>
                        <th scope='col'><center><span class='fas fa-cogs'></span></center></th>
                        </tr></thead><tbody id='myTable'>";
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td><center>" . $row["nombrei"] . "</center></td>
                            <td><center>" . $row["nombrep"] . "</center></td>
                            <td><center>" . $row["stocki"] . "</center></td>
                            <td><center>" . $row["csl"] . "</center></td>
                            <td><center>" . $row["clearr"] . "</center></td>
                            <th><center>" . $row["ue"] . "</center></th>
                            <td><center>" . $row["clears"] . "</center></td>
                            <td><center>" . $row["noapt"] . "</center></td>
                            <td><center>" . $row["otras"] . "</center></td>
                            <td><center>" . $row["consumom"] . "</center></td>
                            <th><center>" . $row["stockf"] . "</center></th>
                            <td align='center'>
                            <a class='nav-link dropdown-toggle' data-toggle='dropdown' href='#' role='button' aria-haspopup='true' aria-expanded='false'></a>
                                <div class='dropdown-menu'>
                                    <a class='dropdown-item' href='ue.php?id_ins=" . $row["id_ins"] . "'>Entregar Unidades</a>
                                    <a class='dropdown-item' href='agregar.php?id_ins=" . $row["id_ins"] . "'>Agregar Insumos</a>
                                    <a class='dropdown-item' href='restar.php?id_ins=" . $row["id_ins"] . "'>Restar Insumos</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='regins.php?id_ins=" . $row["id_ins"] . "'>Modificar</a>
                                    <a class='dropdown-item' href='eliminar.php?id_ins=" . $row["id_ins"] . "'>Borrar</a>
                                </div>
                            </td>
                            </tr>";
                    }
                }
                echo "</tbody></table>";
                $conn->close();
                ?>
                <br><br>
                <div align='center'>
                <a href="createexcel.php" class="btn btn-success">Formulario COMPLETO   &nbsp;<i class="fas fa-file-pdf-o"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="createexcel3.php" class="btn btn-success">Formulario de Pedido  &nbsp;<i class="fas fa-file-pdf-o"></i></a>
                </div>
                
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
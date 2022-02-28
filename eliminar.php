<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<body>
    <?Php
        include "insumos.php"; 
        $id_ins=$_GET["id_ins"];
        $insumos = new insumos("", "", "", "", "", "", "", "", "", "", "");
        $insumos->getbyId($id_ins);
         echo $insumos->borrar($id_ins);
         header("Location:/Farmacia/listins.php");     
    ?>
</body>
</html>
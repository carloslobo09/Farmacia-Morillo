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
        $insumos = new insumos("", "", "", "", "", "", "", "", "", "", "");
         echo $insumos->resetearmes();
         header("Location:/Farmacia/listins.php");     
    ?>
</body>
</html>
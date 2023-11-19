<html>
<head>
<meta charset="UTF-8">
<title>FRUTERIA</title>
</head>
<body>
<div id="container" style="width: 450px;">
<div id="header">
<h1>FRUTERIA DEL SIGLO XXI</h1>
</div>

<div id="content">
<?php 
    session_start();
    include_once 'app/fruteria.php';

    //Muestra bienvenida
    if (!isset($_GET['cliente'])){
        include_once 'app/bienvenida.php';
    } 
    //Muestra compra con el nombre del cliente
    else if (isset($_GET['cliente']) ){
        $_SESSION['cliente']=$_GET['cliente'];
        $_SESSION['fruta'] = null;
        $_SESSION['cantidad'] = null;
        $compraRealizada = MostrarFrutas();
        include_once 'app/compra.php';
    }
    //Añade la fruta y muestra, tambien muuestra terminar
    if(isset($_POST['accion'])) {
        switch ($_POST['accion']){     
            case "Anotar": 
                $_SESSION['cliente']=$_GET['cliente'];
                AñadirFrutas($_POST['fruta'],$_POST['cantidad']);
                $compraRealizada = MostrarFrutas();
                include_once 'app/compra.php';
                break;
            case "Terminar":
                $compraRealizada = MostrarFrutas();
                include_once 'app/despedida.php';
        }
        
    }
    
?>
</div>
</div>
</body>
</html>
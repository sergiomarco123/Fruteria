<?php

function AñadirFrutas($fruta,$cantidad){
    $FrutasArray = isset($_SESSION['fruta']) ? $_SESSION['fruta'] : [];
    $CantidadArray = isset($_SESSION['cantidad']) ? $_SESSION['cantidad'] : [];


    if (!in_array($fruta, $FrutasArray)) {
        array_push($FrutasArray,$fruta);
        array_push($CantidadArray,$cantidad);
    }
    else{
        $posicion = array_search($fruta, $FrutasArray);
        $CantidadArray[$posicion]=$CantidadArray[$posicion]+$cantidad;
    }
    $_SESSION['fruta'] = $FrutasArray;
    $_SESSION['cantidad'] = $CantidadArray;
}

function MostrarFrutas():String{
    $FrutasArray = isset($_SESSION['fruta']) ? $_SESSION['fruta'] : [];
    $CantidadArray = isset($_SESSION['cantidad']) ? $_SESSION['cantidad'] : [];

    $msg="Este es su pedido: </br>";
    $msg .="<fieldset>";
    for($i=0;$i<count($FrutasArray);$i++){
        $msg .=$FrutasArray[$i]. " ".$CantidadArray[$i]."</br>";
    }$msg .="</fieldset>";


    return $msg;
}

?>
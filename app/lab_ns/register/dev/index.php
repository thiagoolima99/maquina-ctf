<?php

    session_start();

    include '../../control/validate.php';

    if($_SESSION['user'] != 'admin'){
        header("location: ../home.php");   
    }

    try {
        
        $path = "arquivos/";
        $diretorio = dir($path);

        echo "Triagem '<strong>".$path."</strong>':<br />";
        while($arquivo = $diretorio -> read()){
        echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
        }
        $diretorio -> close();

    } catch (\Throwable $th) {
        echo $th;
    }

?>

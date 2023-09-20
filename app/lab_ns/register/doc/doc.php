<?php

    session_start();

    $name_page = "Página Inicial";

    include '../../control/validate.php';

?>

<!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>NS Saúde - <?php echo $name_page; ?> </title>
    <link rel="shortcut icon" type="image/png" href="../../public/img/favicon.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../public/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

 </head>

 <body>

<nav class="navbar navbar-light bg-light justify-content-between">
            
    <div class="form-group text-center">
        <a href="../home.php">
            <h5 class="text-success mt-2 mb-0">
                <i class="fas fa-plus-square"></i>
            </h5>
            <h4 class="text-success font-serif">
                NTS Saúde
            </h4>
        </a>
    </div>

    <div class="form-group pl-3 pt-3 pb-3 pr-3 mr-2 border mb-0 bg-white rounded">
        <div class="form-inline col-sm-12">
            <i class="fas fa-user-circle"></i> &nbsp; <?php echo $_SESSION['user'];?>
        </div>
        <hr class="mb-1 mt-1">
        <div class="form-inline justify-content-center col-sm-12">
            <a href="../../../control/logout.php" class="text-secondary"> 
                Sair <i class="fas fa-sign-out-alt"></i>
            </a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row border mt-3 border-success border-top-0 border-left-0 border-right-0">
        <h5 class="font-weight-bold text-secondary  mt-1 mr-2 mb-2">Documentação <i class="fas fa-fisle"></i></h5> 
        <a class="btn btn-warning btn-sm mb-2" href="../home.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

<div class="container">
    <form method="POST">

        <div class="form-row mt-5">

            <h4>O sistema está em processo de atualização. Em breve, as novas diretrizes serão postadas.</h4>

        </div>

   
</div>



</div>

<?php

    session_start();

    include '../../control/validate.php';
   
    if($_SESSION['user'] != 'admin'){
      header("location: ../home.php");
    }

    $name_page = "Info";
    $icone = "fas fa-radiation";

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

<?php
    $dominio= $_SERVER['HTTP_HOST'];
    
    if(md5($dominio) == "421aa90e079fa326b6494f812ad13e79" || 
       md5($dominio) == "f528764d624db129b32c21fbca0cb8d6" )
    {
    echo '
 
 <h3 class="mt-3 p-2 font-weight-bold"> List </h3>
 <ul>
    <li> "Instalar versão recente do PHP <i class="fas fa-check-circle text-success"></i>" </li>
    <li> "Remover funções obsoletas <i class="fas fa-check-circle text-success"></i>" </li>
    <li> "Padronizar telas <i class="fas fa-check-circle text-success"></i>" </li>
    <li> "Adicionar políticas de senhas fortes <i class="fas fa-times-circle text-danger"></i>" </li>
    <li> "Automação exportação relatório de pacientes <i class="fas fa-times-circle text-danger"></i>" </li>
    <li> "Implemetar mecanismo de upload de prontuários em fad5725438f4a054f71d6b9aa9a13fa3.php <i class="fas fa-times-circle text-danger"></i>" </li>
    <li> "implementação service desk <i class="fas fa-times-circle text-danger"></i>"</li>
 </ul>
 ';
    }
    else {
?>

<div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
  <strong>Acesso não autorizado</strong>
</div>

<?php
    }
?>

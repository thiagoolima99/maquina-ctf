<?php

    session_start();

    $name_page = "Usuário";

    if($_SESSION['user'] != 'admin'){
        header("location: ../../home.php");
    }

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/UsuarioDAO.php';

    $acesso = new UsuarioDAO();

    $consulta = $acesso->ConsultaUsuario();
    
    $row = $acesso->ConsultaUsuario()->rowCount();

?>

<nav class="navbar navbar-light bg-light justify-content-between">
            
    <div class="form-group text-center">
        <a href="../../home.php">    
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
    <div class="row border border-success border-top-0 border-left-0 border-right-0">
        <h5 class="font-weight-bold text-secondary mt-1 mr-2 mb-2">Lista de Usuários</h5> 
        <a href="user.php" class="btn btn-sm btn-primary mb-2"> <i class="fas fa-plus-circle "></i> Novo </a>
        <a href="../../home.php" class="btn btn-sm btn-success mb-2 ml-2"> <i class="fas fa-home "></i> Página inicial </a>
    </div>

    <?php if($row > 0) { ?>

    <table class="table mt-3 col-md-12">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuário</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $cont = 0;
                while( $row = $consulta->fetch(PDO::FETCH_OBJ)) {
                $cont++;  ?>
            <tr>
                <th scope="row"> <?php echo $cont ?> </th>
                <td> <?php echo $row->usuario ?> </td>
                <td>  <a class="text-info" href=" <?php echo 'altuser.php?idu='.$row->id.'&user='.$row->usuario ?> "> <i class="fas fa-edit"></i> </a> </td>
            </tr>

            <?php } ?>
        </tbody>
        </table>
    <?php } else {
        echo '
        <div class="mt-3 alert alert-danger" role="alert">
            Não há dados disponíveis.
        </div>
        ';
    }
    
    ?>
</div>
<?php

    session_start();

    $name_page = "Usuário";

    if($_SESSION['user'] != 'admin'){
        header("location: ../../home.php");
    }

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/UsuarioDAO.php';

    $id = filter_input(INPUT_GET, 'idu', FILTER_SANITIZE_STRING);
    $user = filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING);

    $acesso = new UsuarioDAO();

    $consulta = $acesso->IdUsuario($id, $user);
    $row = $consulta->rowCount();

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

<?php if($row > 0) { 
        $dados = $consulta->fetchAll(PDO::FETCH_OBJ);
    ?>

<div class="container">
    <div class="row border mt-3 border-success border-top-0 border-left-0 border-right-0">
        <h5 class="font-weight-bold text-secondary mt-1 mr-2 mb-2">Edição de Usuário</h5>
        <a class="btn btn-sm btn-warning mb-2" href="listuser.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

    <div class="mt-5">

        <form method="POST">
        
            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Usuário</label>
                <input type="text" class="form-control" disabled value=" <?php echo $dados[0]->usuario ?> ">
            </div>

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Senha *</label>
                <input type="text" require class="form-control" name="senhaalt">
            </div>

            <input type="hidden" name="idalt"  value="<?php echo $dados[0]->id ?>">

            <div class="form-group col-md-4">
                <button class="btn btn-success mt-4" type="submit" name="alterar"> 
                    Atualizar <i class="fas fa-save"></i>
                </button>
            </div>

        </form>

    </div>

</div>

<?php } 


    $alterar = filter_input(INPUT_POST, 'alterar', FILTER_SANITIZE_STRING);

    if(isset($alterar)){
        $idalt = filter_input(INPUT_POST, 'idalt', FILTER_SANITIZE_STRING);
        $senhaalt = filter_input(INPUT_POST, 'senhaalt', FILTER_SANITIZE_STRING);

        if($senhaalt == ''||$senhaalt == null){
            echo "<p class='alert alert-danger'>Insira uma senha válida</p>";
        } else {
            $alterar = $acesso->AtualizaUsuario($idalt,$senhaalt);

            if($alterar){
                echo "<p class='alert alert-success'>Atualizado com sucesso</p>";
            }
        }
    }

?>
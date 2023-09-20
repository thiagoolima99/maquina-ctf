<?php

    session_start();

    $name_page = "Paciente";

    if($_SESSION['user'] != 'admin'){
        header("location: ../../home.php");
    }

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/PacienteDAO.php';

    $id = filter_input(INPUT_GET, 'idp', FILTER_SANITIZE_STRING);

    $acesso = new PacienteDAO();

    $consulta = $acesso->IdPaciente($id);
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

<div class="container">
    <div class="row border mt-3 border-success border-top-0 border-left-0 border-right-0">
        <h5 class="font-weight-bold text-secondary  mt-1 mr-2 mb-2">Edição de Paciente</h5> 
        <a class="btn btn-warning btn-sm mb-2" href="listpatient.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

    <?php if($row > 0) { 
        $dados = $consulta->fetchAll(PDO::FETCH_OBJ);
    ?>

    <form method="POST">
        
        <div class="form-row mt-5">

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Nome *</label>
                <input type="text" class="form-control" disabled value="<?php echo $dados[0]->nome; ?>">
            </div>

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Telefone *</label>
                <input type="text" class="form-control" disabled value="<?php echo $dados[0]->telefone; ?>">
            </div>

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">CPF *</label>
                <input type="text" class="form-control" disabled value = "<?php echo $dados[0]->cpf; ?>">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">CEP</label>
                <input type="text" name="cepp" class="form-control" value="<?php echo $dados[0]->cep; ?>">
            </div>

            <div class="form-group col-md-6">
                <label class="font-weight-bold" for="">Endereço</label>
                <input type="text" name="enderecop" class="form-control" value="<?php echo $dados[0]->endereco; ?>">
            </div>

            <input type="hidden" name="idalt"  value="<?php echo $dados[0]->idpaciente ?>">

            <div class="form-group col-md-2">
                <label class="font-weight-bold" for="">Status</label>
                <select name="statusp" class="form-control">
                    <option value="<?php echo $dados[0]->statusp; ?>"> " <?php echo $dados[0]->statusp ? 'Sim' : 'Não' ; ?> " </option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
                </select>
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <button class="btn btn-success mt-4" type="submit" name="alterar"> 
                    Atualizar <i class="fas fa-save"></i>
                </button>
            </div>

        </div>

    </form>

    <?php 
    }

        $alterar = filter_input(INPUT_POST, 'alterar', FILTER_SANITIZE_STRING);

        if(isset($alterar)){
            $cepp = filter_input(INPUT_POST, 'cepp', FILTER_SANITIZE_STRING);
            $enderecop = filter_input(INPUT_POST, 'enderecop', FILTER_SANITIZE_STRING);
            $statusp = filter_input(INPUT_POST, 'statusp', FILTER_SANITIZE_STRING);
            $idp = filter_input(INPUT_POST, 'idalt', FILTER_SANITIZE_STRING);

            if($cepp == '' || $cepp == null){
                $cepp = 'Não informado';
            }

            if($enderecop == '' || $enderecop == null){
                $enderecop = 'Não informado';
            }

            if($statusp == '' || $statusp == null){
                $statusp = 'S';
            }

            if($idp == '' || $idp == null){
                echo "<p class='alert alert-danger'>É necessário informar o paciente.</p>";
            } else {

                $alterar = $acesso->AtualizaPaciente($cepp,$enderecop,$statusp,$idp);

                if($alterar){
                    echo "<p class='alert alert-success'>Atualizado com sucesso</p>";
                    $url = "altpatient.php?idp=$idp";
    
                    echo'
                    <script>
                    setTimeout(function() {
                        window.location.href = "'.$url.'";
                    }, 500)
                    </script>
                    ';
                }
            }
        }

    ?>

</div>
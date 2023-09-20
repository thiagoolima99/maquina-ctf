<?php

    session_start();

    $name_page = "Paciente";

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/PacienteDAO.php';

    $acesso = new PacienteDAO();

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
        <h5 class="font-weight-bold text-secondary  mt-1 mr-2 mb-2">Cadastro de Paciente</h5> 
        <a class="btn btn-warning btn-sm mb-2" href="listpatient.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

    <form method="POST">
        
        <div class="form-row mt-5">

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Nome *</label>
                <input type="text" required name="nomep" class="form-control" value="">
            </div>

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">Telefone *</label>
                <input type="text" required name="telefonep" class="form-control" value="">
            </div>

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">CPF *</label>
                <input type="text" required name="cpfp" class="form-control" value="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <label class="font-weight-bold" for="">CEP</label>
                <input type="text" name="cepp" class="form-control" value="">
            </div>

            <div class="form-group col-md-8">
                <label class="font-weight-bold" for="">Endereço</label>
                <input type="text" name="enderecop" class="form-control" value="">
            </div>

        </div>

        <div class="form-row">

            <div class="form-group col-md-4">
                <button class="btn btn-success mt-4" type="submit" name="salvar"> 
                    Cadastrar <i class="fas fa-save"></i>
                </button>
            </div>

        </div>

    </form>

    <?php 


        $salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

        if(isset($salvar)){
            $nomep = filter_input(INPUT_POST, 'nomep', FILTER_SANITIZE_STRING);
            $telefonep = filter_input(INPUT_POST, 'telefonep', FILTER_SANITIZE_STRING);
            $cpfp = filter_input(INPUT_POST, 'cpfp', FILTER_SANITIZE_STRING);
            $cepp = filter_input(INPUT_POST, 'cepp', FILTER_SANITIZE_STRING);
            $enderecop = filter_input(INPUT_POST, 'enderecop', FILTER_SANITIZE_STRING);

            if($cepp == '' || $cepp == null){
                $cepp = 'Não informado';
            }
            if($enderecop == '' || $enderecop == null){
                $enderecop = 'Não informado';
            }

            if ($nomep == '' || $nomep == null || 
                $telefonep == '' || $telefonep == null || 
                $cpfp == '' || $cpfp == null) {
                echo "<p class='alert alert-danger'>É necessário informar os dados obrigatórios do paciente.</p>";
            }
            else {

                $salvar = $acesso->CadastroPaciente($nomep,$telefonep,$cpfp,$cepp,$enderecop);

                if($salvar){
                    echo "<p class='alert alert-success'>Salvo com sucesso</p>";
                } else {
                    echo "<p class='alert alert-danger'>Não pode haver usuário duplicado. Por favor, insira o seu CPF</p>";
                }

            }

        }

    ?>

</div>
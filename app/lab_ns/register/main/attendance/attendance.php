<?php

    session_start();

    $name_page = "Atendimento";

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/AtendimentoDAO.php';


    $acesso = new AtendimentoDAO();


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
        <h5 class="font-weight-bold text-secondary  mt-1 mr-2 mb-2"> Fichamento Atendimento </h5> 
        <a class="btn btn-sm btn-warning mb-2" href="listattendance.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

        <form method="POST">
        
            <div class="form-row mt-3">
                <div class="form-group">
                    <label class="font-weight-bold" for=""> Digite o CPF do paciente: </label>
                    <input type="text" required name="cpf" class="form-control" value="<?php echo $_SESSION['cpf'] ?? ''; ?>">

                    <label class="font-weight-bold" for=""> Caso ainda não possua cadastro: </label>
                    <a href="../patient/patient.php">Faça o cadastro do paciente</a>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <button class="btn btn-primary mb-3" type="submit" name="pesquisar"> 
                        Pesquisar <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
            <?php
                $pesquisar = filter_input(INPUT_POST, 'pesquisar', FILTER_SANITIZE_STRING);

                if(isset($pesquisar)){

                    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
                    
                    if($cpf == '' || $cpf == null){
                        echo "<p class='alert alert-danger'>Digite o CPF do paciente</p>";
                    } else {
                    
                    $row = $acesso->DadosPaciente($cpf)->rowCount();
                    
                    if($row == 0){
                        echo "Não há pacientes com o CPF informado";
                    } else {

                    $_SESSION['cpf'] = $cpf;

                    $dados = $acesso->DadosPaciente($cpf)->fetchAll(PDO::FETCH_OBJ);
            ?>
                
                <input type="hidden" name="paciente" value="<?php echo $dados[0]->idpaciente ?>">

                <div class="form-row">

                <div class="form-group col-md-6">
                    <label class="font-weight-bold" for="">Nome</label>
                    <input type="text" class="form-control" disabled value="<?php echo $dados[0]->nome ?>">
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold" for="">Prontuário *</label>
                        <textarea class="form-control col-md-12" required name="descpront" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                    <button class="btn btn-success mt-4" type="submit" name="salvar"> 
                        Cadastrar <i class="fas fa-save"></i>
                    </button>
                    </div>
                </div>
            
            <?php
                    }

                    }

                }
            ?>


            

        </form>

<?php 


    $salvar = filter_input(INPUT_POST, 'salvar', FILTER_SANITIZE_STRING);

    if(isset($salvar)){
        $paciente = filter_input(INPUT_POST, 'paciente', FILTER_SANITIZE_STRING);
        $descpront = filter_input(INPUT_POST, 'descpront', FILTER_SANITIZE_STRING);

        if ($paciente == '' || $paciente == null || 
            $descpront == '' || $descpront == null) {
            echo "<p class='alert alert-danger'>É necessário informar os dados obrigatórios.</p>";
        }
        else {

            $salvar = $acesso->CadastroAtendimento($paciente,$descpront,$_SESSION['user']);

            if($salvar){
                echo "<p class='alert alert-success'>Salvo com sucesso</p>";
            }

        }
    }

?>

</div>
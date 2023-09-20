<?php

    session_start();

    $name_page = "Atendimento";

    if($_SESSION['user'] != 'admin'){
        header("location: ../../home.php");
    }

    include '../../include/menu.php';
    include '../../../control/validate.php';
    include '../../../control/AtendimentoDAO.php';


    $acesso = new AtendimentoDAO();

    $id = filter_input(INPUT_GET, 'idat', FILTER_SANITIZE_STRING);

    $consulta = $acesso->IdAtendimento($id);
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
        <h5 class="font-weight-bold text-secondary  mt-1 mr-2 mb-2"> Atualizar Fichamento </h5> 
        <a class="btn btn-sm btn-warning mb-2" href="listattendance.php"> <i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
    </div>

        <form method="POST">

        <?php if($row > 0) { 
            $dados = $consulta->fetchAll(PDO::FETCH_OBJ);
        ?>
                
                <input type="hidden" name="atendimento" value="<?php echo $dados[0]->idatendimento ?>">

                <div class="form-row">

                <div class="form-group col-md-6">
                    <label class="font-weight-bold" for="">Nome</label>
                    <input type="text" class="form-control" disabled 
                        value="<?php echo $acesso->PacienteAtendimento($dados[0]->idpaciente) ?>">
                </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="font-weight-bold" for="">Prontuário *</label>
                        <textarea class="form-control" required name="descpront" rows="4"><?php echo $dados[0]->descprontuario ?></textarea>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                    <button class="btn btn-success mt-4" type="submit" name="atualizar"> 
                        Atualizar <i class="fas fa-save"></i>
                    </button>
                    </div>
                </div>
            
            <?php
                    } else {
                        echo '
                        <div class="mt-3 alert alert-danger" role="alert">
                            Não há dados disponíveis.
                        </div>
                        ';
                    }
            ?>


            

        </form>

<?php 


    $atualizar = filter_input(INPUT_POST, 'atualizar', FILTER_SANITIZE_STRING);

    if(isset($atualizar)){
        $atendimento = filter_input(INPUT_POST, 'atendimento', FILTER_SANITIZE_STRING);
        $descpront = filter_input(INPUT_POST, 'descpront', FILTER_SANITIZE_STRING);

        if ($atendimento == '' || $atendimento == null || 
            $descpront == '' || $descpront == null) {
            echo "<p class='alert alert-danger'>É necessário informar os dados obrigatórios.</p>";
        }
        else {

            $atualizar = $acesso->AtualizaAtendimento($atendimento,$descpront);

            if($atualizar){
                echo "<p class='alert alert-success'>Atualizado com sucesso</p>";
                    $url = "altattendance.php?idat=$id";

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
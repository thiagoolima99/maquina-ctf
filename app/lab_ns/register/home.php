<?php

    session_start();

    $name_page = "Página Inicial";

    include 'menu.php';
    include '../control/validate.php';

    if(!isset($_SESSION['nivel'])){
        
        $_SESSION['nivel'] = 'padrao';
    }

?>
        <nav class="navbar navbar-light bg-light justify-content-between">
            
            <div class="form-group text-center">
                <h5 class="text-success mt-2 mb-0">
                    <i class="fas fa-plus-square"></i>
                </h5>
                <h4 class="text-success font-serif">
                    NTS Saúde
                </h4>
            </div>

            <div class="form-group pl-3 pt-3 pb-3 pr-3 mr-2 border mb-0 bg-white rounded">
                <div class="form-inline col-sm-12">
                    <i class="fas fa-user-circle"></i> &nbsp; <?php echo $_SESSION['user'];?>
                </div>
                <hr class="mb-1 mt-1">
                <div class="form-inline justify-content-center col-sm-12">
                    <a href="../control/logout.php" class="text-secondary"> 
                        Sair <i class="fas fa-sign-out-alt"></i>
                    </a>
                </div>
            </div>
        </nav>

        <div class="container">

        


        <?php
            echo "<br>";
            if($_SESSION['user'] == 'admin' && $_SESSION['nivel'] == 'padrao'){
        ?>

            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Olá, administrador!</h4>
                <p>Para prosseguir, insira o PIN de 4 dígitos que lhe foi enviado no e-mail de confirmação de cadastro do usuário.</p>
                <hr>
                <form method="post">
                    <input type="number" name="pin" class="form-control col-md-4">
                    <button class="btn btn-warning mt-3" type="submit" name="submit"> 
                        <i class="fas fa-key"></i> Validar  
                    </button>
                </form>
            </div>

        <?php
            }

            $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);

            if(isset($submit)){
                $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);

                if($pin == 1538){
                    $_SESSION['nivel']='admin';
                    header("location:home.php");
                } else if (strlen($pin) > 4) {
                    echo "tamanho excede o limite de caracteres";
                } else if (strlen($pin) < 4) {
                    echo "tamanho inferior ao formato definido";
                } else if (!is_numeric($pin)) {
                    echo "válido somente números";
                }
            }

            if( (isset($_SESSION['nivel']) && $_SESSION['user'] != 'admin') ||
                ($_SESSION['user'] == 'admin' && $_SESSION['nivel'] == 'admin')
            ) {

                include 'generatem.php';

                generateMenu($_SESSION['nivel']);

            }

        ?>

        </div>

<?php include 'footer.php' ?>

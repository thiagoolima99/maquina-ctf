<?php

    if(isset($_SESSION['user']) && isset($_SESSION['nivel'])){

        function generateMenu($nivel){
            if($nivel == 'admin'){
                echo '
                
                <div class="row border border-success border-top-0 border-left-0 border-right-0">
                    <h5 class="font-weight-bold text-secondary">Página inicial</h5>
                </div>

                <div class="container text-center mt-3">   
                
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8" 
                        href="main/attendance/listattendance.php">
                        <i class="fas fa-headset"></i> Atendimento
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="main/patient/listpatient.php">
                        <i class="fas fa-address-card"></i> Paciente
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="admin/user/listuser.php">
                        <i class="fas fa-user"></i> Usuário
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="doc/doc.php">
                        <i class="fas fa-file"></i> Documentação
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="doc/suport.php">
                        <i class="fas fa-info-circle"></i> Suporte técnico
                    </a>
                
                </div>

                <div class="form-row">
                    <a href="admin/order.php" class="btn-dev"> 
                        <i class="fas fa-laptop-code"></i> 
                    </a>
                </div> 

                ';
            } else if( $nivel == 'padrao' ){
                echo '
                
                <div class="row mb-4 border border-success border-top-0 border-left-0 border-right-0">
                    <h5 class="font-weight-bold text-secondary">Página inicial</h5>
                </div>

                <div class="container text-center mt-3">   
                
                    <a class="btn btn-secondary mt-5 font-weight-bold m-2 p-2 col-sm-8" 
                        href="main/attendance/listattendance.php">
                        <i class="fas fa-headset"></i> Atendimento
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="main/patient/listpatient.php">
                        <i class="fas fa-address-card"></i> Paciente
                    </a>
                    <a class="btn btn-secondary font-weight-bold m-2 p-2 col-sm-8"  
                        href="doc/doc.php">
                        <i class="fas fa-file"></i> Documentação
                    </a>
                
                </div>
        
                ';
            }
        }

    }

?>
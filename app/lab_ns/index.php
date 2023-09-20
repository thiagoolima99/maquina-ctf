<!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>NS Saúde</title>
    <link rel="shortcut icon" type="image/png" href="public/img/favicon.png"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
 </head>
 <body>

    <?php 

        session_start();

	    unset($_SESSION["key_pass"]);
	    unset($_SESSION["user"]);
	    unset($_SESSION["nivel"]);
        
        if (isset($_SESSION["key_pass"])) {
            header("location: register/home.php");
        }

        $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);

        if(isset($submit)){

            include "control/UsuarioDAO.php";	
            $acesso = new UsuarioDAO();

            $user = $_POST['user'];
            $password = $_POST['password'];

            $validacao = $acesso->VerificacaoUsuario($user,$password);

            if($validacao > 0){
                $_SESSION["key_pass"] = $user."/".date('Y-m-d');
                $_SESSION["user"] = $user;
                header("location: register/home.php");
            }

        }


    ?>

    <nav class="navbar navbar-light bg-light justify-content-between">
        
        <div class="form-group text-center">
            <h5 class="text-success mb-0">
                <i class="fas fa-plus-square"></i>
            </h5>
            <h4 class="text-success font-serif">
                NTS Saúde
            </h4>
        </div>

        <div class="form-group">
            <label class="font-weight-bold text-success font-serif" for="user">Área restrita</label>
            <form class="form-inline" method="post">
                <input class="form-control mb-sm-2 mb-md-0 form-control-sm mr-sm-2" 
                    type="text" name="user" id="user"
                    placeholder="Usuário">
                <input class="form-control mb-sm-2 mb-md-0 form-control-sm mr-sm-2" 
                    type="password" name="password" id="password"
                    placeholder="Senha">
                <button class="btn btn-sm btn-outline-success my-2 my-sm-0" 
                    type="submit" name="submit">
                    Acessar
                </button>
            </form>
        </div>
    </nav>

    <div class="container">

        <h1 class="text-center title-home text-success mt-3">Sua saúde é o nosso foco!</h1>

        <section>

            <div class="form-row d-flex justify-content-center">
                <div class="card shadow col-md-3 m-3">
                    <img class="card-img-top img-thumbnail" src="public/img/card-1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-success">Preços</h5>
                        <p class="card-text">Conheça nossos planos, acessível para todos os públicos com atendimento de qualidade.</p>
                        <p class="text-right">
                            <a href="#" data-toggle="modal" data-target="#precos"> 
                                <i class="fas fa-search text-success cursor-pointer"></i> 
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card shadow col-md-3 m-3">
                    <img class="card-img-top img-thumbnail" src="public/img/card-2.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-success">Serviços</h5>
                        <p class="card-text">Conheça nossos serviços, conosco sua saúde está em boas mãos.</p>
                        <p class="text-right">
                            <a href="#" data-toggle="modal" data-target="#servicos"> 
                                <i class="fas fa-search text-success cursor-pointer"></i> </a>
                        </p>
                    </div>
                </div>
                <div class="card shadow col-md-3 m-3">
                    <img class="card-img-top img-thumbnail" src="public/img/card-3.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-success">Equipe</h5>
                        <p class="card-text">Venha conhecer nossa empresa, nossa equipe e como dedicamos pelo melhor que é sua saúde.</p>
                        <p class="text-right">
                            <a href="#" data-toggle="modal" data-target="#somos"> 
                                <i class="fas fa-search text-success cursor-pointer"></i> </a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="modal fade" id="precos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold text-success"> <i class="fas fa-dollar-sign "></i> Preços</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-justify small text-uppercase">
            <div class="form-row">

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <b class="text-success"> <i class="fas fa-folder "></i> Plano individual</b> <br>   
                                Que tal possuir o melhor plano com os melhores profissionais e atendimento de qualidade? <br>
                                Valores acessíveis a todos os públicos. A partir de R$ <b class="text-success">30,00/mês</b> (SEM TAXA DE ADESÃO).
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-folder "></i> Plano Casal</b> <br>   
                                Que tal possuir e fornecer o que há de melhor para seu(sua) companheiro(a)? <br>
                                Valores acessíveis a todos os públicos. A partir de R$ <b class="text-success">50,00/mês</b> (SEM TAXA DE ADESÃO).
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-folder "></i> Plano Família</b> <br>   
                                Família é o bem mais precioso! Nosso plano permite o conforto, para o casal e seus filhos (máx 2). <br>
                                Valores acessíveis a todos os públicos. A partir de R$ <b class="text-success">70,00/mês</b> (SEM TAXA DE ADESÃO).<br>
                                <i>R$ 15,00 há cada parente a mais adicionado (não há necessidade de ser filho).</i>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row text-center">
                <h4>Reserve já um horário com um de nossos atendentes.</h4>
            </div>

            <div class="form-row text-center">
                <h6 class="text-success"> <i class="fas fa-mail"></i> comercial@ntssaude.com.br </h6>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="servicos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold text-success">Serviços <i class="fas fa-cogs"></i> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-justify small text-uppercase">
            <div class="form-row">

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                                <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Rede Exclusiva</b> <br>   
                                O NTS Saúde conta com uma completa estrutura à sua disposição.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Odontologia Incluída</b> <br>   
                            Plano de odontologia incluído, com prevenção, diagnóstico, urgência 24h. ADICIONAL (cobertura em todo Brasil).
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Rede pediátrica</b> <br>   
                            A terceira maior rede exclusiva de atendimento infantil com infraestrutura moderna e especializada.
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Contact Center 24h</b> <br>   
                            Sem perda de tempo: a sua saúde não espera. Marcação de consulta, exames e autorização via call center exclusivo.
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Atendimento On-line</b> <br>   
                            Aqui você pode ser atendido on-line, em caso de atestado, enviamos um comprovante para o seu e-mail ou whatsapp.
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <b class="text-success"> <i class="fas fa-arrow-alt-circle-right"></i> Agendamento On-line</b> <br>   
                            Agendamento de consultas, autorização online e tira dúvidas direto pelo chat são alguns serviços oferecidos em nosso site.
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-row text-center">
                <h4>Reserve já um horário com um de nossos atendentes.</h4>
            </div>

            <div class="form-row text-center">
                <h6 class="text-success"> <i class="fas fa-mail"></i> comercial@ntssaude.com.br </h6>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="somos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Quem somos?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body text-justify small text-uppercase">
            
            <div class="form-row">
                <h3 class="text-success">Nossa equipe, nossa história <i class="fas fa-users"></i></h3>
            </div>    
            <div class="form-row">
                <p>Iniciamos em 2012, e, desde então, temos conquistado clientes em todo o Brasil.</p>
                <p>Nosso foco é poder levar atendimento de qualidade, com profissionais especialistas e qualificados para todos os públicos.</p>
                <p>Nosso lema é: Sua saúde é o nosso foco e vestimos como farda.</p>
                <p>Iniciamos com um grupo pequeno, 10 médicos e 6 operários organizacionais.</p>
                <p>Hoje, temos orgulho em informar, que temos em média 500 profissionais em cada estado, presencialmente. 300 profissionais separados para o foco on-line, POR ESTADO.</p>
                <p>Nossos clientes possuem os melhores serviços e atendimento em tempo hábil.</p>
                <p>Porque o nosso cliente, merece o melhor!</p>
            </div>

            <div class="form-row text-center">
                <h4>Reserve já um horário com um de nossos atendentes.</h4>
            </div>

            <div class="form-row text-center">
                <h6 class="text-success"> <i class="fas fa-mail"></i> comercial@ntssaude.com.br </h6>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
    </div>

    <footer class="d-flex justify-content-center bg-success text-white">
        <p class="d-flex align-items-center mt-3">
            2020 © Todos os direitos reservados - &nbsp;
            <a class="text-white" href="https://localhost/" 
                target="_blank"> 
            </a>
        </p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#precos').trigger('focus');
            $('#servicos').trigger('focus');
            $('#somos').trigger('focus');
        })
    </script>

 </body>
 </html>

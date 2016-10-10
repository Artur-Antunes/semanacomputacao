<script>
    function recusarLetras(e)
    {
        var tecla = new Number();
        if (window.event) {
            tecla = e.keyCode;
        }
        else if (e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if ((tecla >= "58") && (tecla <= "127")) {
            return false;
        }
    }

    function digitarCpf(e)
    {
        var tecla = new Number();
        if (window.event) {
            tecla = e.keyCode;
        }
        else if (e.which) {
            tecla = e.which;
        }
        else {
            return true;
        }
        if ((tecla <= "47") || (tecla >= "58")) {
            return false;
        }
    }
</script>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inscrição</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <img src="../img/semanacomp.png" class="img-responsive">
            </div>
        </div>

        <hr class="featurette-divider">
        <div class="row-fluid clearfix" align="center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="well">
                    <div class="row">
                        <fieldset>
                            <!-- Name -->
                            <legend>FORMULÁRIO DE INSCRIÇÃO</legend>

                            <form action="confirmar.php" method = "POST" class="form-horizontal">

                                <legend><h3>Dados Pessoais</h3></legend>

                                <!-- Nome -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nome">Nome: </label>  
                                    <div class="col-md-6">
                                        <input type="text" name="nome" required="required" placeholder="Nome" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- Select Sexo -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="sexo">Sexo:</label>
                                    <div class="col-md-6">
                                        <select name="sexo" class="form-control">
                                            <option value="M">Masculino</option>
                                            <option value="F">Feminino</option>
                                        </select>
                                    </div>
                                </div>                        

                                <!-- Endereço -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="endereco">Endereço:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="endereco" required="required" placeholder="Ex: Rua São Pedro" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- complemento -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="complemento">Complemento:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="complemento" placeholder="APT - 101" required="required" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- CPF -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="cpf">CPF:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="cpf"  id="cpf" size="11" maxlength="11" onkeypress="return digitarCpf(event)"  pattern="\d{11}" title="Digite o CPF no formato nnnnnnnnnnn" required="required"  placeholder="Ex:99999999999" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Telefone-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
                                    <div class="col-md-6">
                                        <input type="tel" required="required" maxlength="15" name="telefone" placeholder="(99)9999-9999" onkeypress="return recusarLetras(event)" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Celular-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="celular">Celular:</label>  
                                    <div class="col-md-6">
                                        <input type="tel" required="required" maxlength="15" name="celular" onkeypress="return recusarLetras(event)" placeholder="9.9999-9999" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Email-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email:</label>  
                                    <div class="col-md-6">
                                        <input type="email" name="email" required="required" size="45" placeholder="exemplo@exemplo.com" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  class="form-control input-md">
                                    </div>
                                </div>
                        </fieldset>
                    </div>
                </div>
            </div>  
        </div>

        <div class="row-fluid clearfix" align="center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="well">
                    <div class="row">
                        <fieldset>

                            <!-- Form Name -->
                            <legend>Tipos de Inscrição</legend>

                            <!-- Radios -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="tipo1"></label>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label for="tipo1-0">
                                            <input type="radio" name="tipo1" value="PALESTRA" checked>
                                            PALESTRAS (R$: 20,00)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="tipo1-1">
                                            <input type="radio" name="tipo1" value="MINI-CURSO">
                                            MINI-CURSOS (R$: 20,00)
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="tipo1-2">
                                            <input type="radio" name="tipo1" value="PALESTRA E MINI-CURSO">
                                            PALESTRAS E MINI-CURSOS (R$: 30,00)
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                    </div>
                </div>
            </div>  
        </div>
        <div align="center">
            </br><button type="submit" id="btnProximo" name="btnProximo" class="btn btn-primary" value = "Avançar">Avançar</button></br></br></br>
            <a href="finalizar.php"> 2º Via Comprovante </a>
        </div>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
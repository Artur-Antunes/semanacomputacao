<?php
if (isset($_POST['btnProximo'])) {
    //SCRIPT VALIDAÇÃO CPF.......................................
    $valor = ($_POST['tipo1'] == "PALESTRA E MINI-CURSO" ? "R$ 30,00" : "R$ 20,00");
    $cpf = $_POST['cpf'];
    $verifica = true;
    if ($cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
        $verifica = false;
        // Calcula os digitos verificadores para verificar se CPF é válido...
    } else {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                $verifica = false;
            }
        }
    }
    if ($verifica == true) {
        ?>
        <script>
            alert("Cofira se todos os dados estão corretos.");
        </script>';
        <?php
    } else {
        ?>
        <script>
            alert("CPF Inválido!");
            window.history.go(-1);
        </script>';
        <?php
    }
}
//FIM SCRIPT VALIDAÇÃO CPF...
if (isset($_POST['btnConfirmar'])) {
    $nome = ($_POST['nome']);
    $sexo = ($_POST['sexo']);
    $endereco = ($_POST['endereco']);
    $complemento = ($_POST['complemento']);
    $cpf = ($_POST['cpf']);
    $telefone = ($_POST['telefone']);
    $celular = ($_POST['celular']);
    $email = ($_POST['email']);
    $pacote = ($_POST['tipo_inscricao']);
    $valor = ($_POST['valor']);

    session_start();
    $_SESSION['cpf'] = $cpf;

    $mysqli = new mysqli("localhost", "root", "", "inscricao");

    if ($mysqli->connect_errno) {
        echo ' <script>
                            alert("Problema na conexão com o banco !");
                            window.location.href = "index.php";
                   </script>';
        die();
    } else {
        //include 'gerar_pdf.php';
        if ($mysqli->query("INSERT INTO cadastro(nome,sexo,endereco,complemento,cpf,telefone,celular,email,pacote) VALUES('$nome','$sexo','$endereco','$complemento','$cpf','$telefone','$celular','$email','$pacote')")) {
            ?>
            <script>
                alert(" Dados Salvo Com Sucesso !");
                window.location.href = "finalizar.php";
            </script>'
            <?php
        } else {
            ?>
            <script>
                alert(" CPF já cadastrado !");
                window.location.href = "index.php";
            </script>'
            <?php
        }
    }
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Confirmação</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <img src="../img/semanacomp.png" class="img-responsive">
            </div>
        </div>

        <hr class="featurette-divider" align="center">

        <div class="row-fluid clearfix">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="well">
                    <div class="row">
                        <fieldset>
                            <legend><h3 class="text-center">Confirmação de Dados</h3></legend>

                            <form method = "POST" class="form-horizontal">

                                <!-- Nome -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nome">Nome:</label>  
                                    <div class="col-md-6">
                                        <input type = "text" name = "nome" value="<?php echo strtr(strtoupper($_POST['nome']), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß"); ?>"  readonly="true" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- Sexo -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="nome">Sexo: </label>  
                                    <div class="col-md-6">
                                        <input type = "text" name = "sexo" value="<?php echo strtoupper($_POST['sexo']); ?>"  readonly="true" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- Endereço -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="endereco">Endereço:</label>  
                                    <div class="col-md-6">
                                        <input type = "text" name = "endereco" value="<?php echo strtr(strtoupper($_POST['endereco']), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß"); ?>"  readonly="true" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- complemento -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="complemento">Complemento:</label>  
                                    <div class="col-md-6">
                                        <input type = "text" name = "complemento" value="<?php echo strtr(strtoupper($_POST['complemento']), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß"); ?>" readonly="true" class="form-control input-md"> 
                                    </div>
                                </div>

                                <!-- CPF -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="cpf">CPF:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="cpf" value="<?php echo $_POST['cpf']; ?>" readonly="true" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Telefone-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $_POST['telefone']; ?>" name="telefone" readonly="true" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Celular-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="celular">Celular:</label>  
                                    <div class="col-md-6">
                                        <input type="text" value="<?php echo $_POST['celular']; ?>" name="celular" readonly="true" class="form-control input-md">
                                    </div>
                                </div>

                                <!-- Email-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="email" value="<?php echo $_POST['email']; ?>" readonly="true" class="form-control input-md">
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
                            <legend><h3 class="text-center">Tipo de Inscrição</h3></legend>

                            <!-- Tipo -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Tipo de Inscrição</label>  
                                <div class="col-md-6">
                                    <input type="text" name="tipo_inscricao" value="<?php echo $_POST['tipo1']; ?>" readonly="true" class="form-control input-md">
                                </div>
                            </div>

                            <!-- Valor -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">Valor da Inscrição:</label>  
                                <div class="col-md-6">
                                    <input type="text" name="valor" value="<?php echo $valor; ?>" readonly="true" class="form-control input-md">
                                </div>
                            </div></br>

                        </fieldset>
                    </div>
                </div>
            </div> 
        </div>

        <div align="center">
            </br><input type = "submit" name = "btnConfirmar" value = "Salvar" class="btn btn-primary"/></br></br></br>
            <a href="javascript:window.history.go(-1)">Voltar</a> 
        </div>
    </form>
</body>
</html>
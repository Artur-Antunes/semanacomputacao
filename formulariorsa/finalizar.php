<?php
session_start();
if (isset($_POST['btnConcluir'])) {

    $cpf = $_POST['cpf'];
    $mysqli = new mysqli("localhost", "root", "", "inscricao");
    $resultado = $mysqli->query("SELECT * FROM cadastro where cpf='$cpf'");
    $tarefas = array();

    if ($tarefa = mysqli_fetch_assoc($resultado)) {
        $nome = $tarefa['nome'];
        $cpfRetorno = $tarefa['cpf'];
        $endereco = $tarefa['endereco'];
        $complemento = $tarefa['complemento'];
        $telefone = $tarefa['telefone'];
        $celular = $tarefa['celular'];
        $pacote = $tarefa['pacote'];
        $email = $tarefa['email'];
        $valor = ($pacote == "PALESTRA E MINI-CURSO" ? "R$ 30,00" : "R$ 20,00");


        include 'gerar_pdf.php';
        $filename = 'semana_computacao';
        $html = '<html>.
                 <meta charset="utf-8">
                 <body> 
                  <div align="center">
                  <img src="../img/logo_ursa.png"/>
                  <div align="center">
                <center>
                            <legend>INSTITUTO DE ENSINO SUPERIOR RSÁ</legend>.
                            <legend>SEMANA DA COMPUTAÇÃO</legend>.
                            <legend>FORMULÁRIO DE INSCRIÇÃO</legend>
                        </center>        
                        <table  align="center" border="1" cellpadding="3" cellspacing="10">
                            <tr bgcolor"red"><td colspan="2" align="center" bgcolor="#CCCCCC" >DADOS DO PARTICIPANTE</td></tr><tr>
                                <td> Nome: ';
                                    $html.=strtr(strtoupper($nome), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
                                    $html.='<td> CPF: ' . $cpfRetorno . ' </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" bgcolor="#CCCCCC">ENDEREÇO</td>
                            </tr>
                            <tr>
                                <td colspan="2">';
                                    $html.=strtr(strtoupper($endereco), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß") . ", " . strtr(strtoupper($complemento), "àáâãäåæçèéêëìíîïðñòóôõö÷øùüúþÿ", "ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÚÞß");
                                    $html.= '</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" bgcolor="#CCCCCC">CONTATO(S)</td>
                            </tr>
                            <tr>
                                <td> Fone(s): ' . ($telefone) . ' / ' . $celular . '</td>
                                <td> Email: ' . $email . '</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center" bgcolor="#CCCCCC">DADOS DA INSCRIÇÃO</td>
                            </tr>
                            <tr>
                                <td> Tipo: ' . $pacote . '</td>
                                <td> Valor à pagar: ' . $valor . '</td>
                            </tr>
                          </table><br><br><br><br><br><br><br><br>
                    </center>
______________________________________
                <footer>
                    <li><a href="#">Sobre o autor</a></li>
                    <li><a href="#">Mapa do site</a></li>
                    <li><a href="#">Entre em contato</a></li>
                </footer>
                    </body>
                </html>';
                pdf_create($html, $filename, 'A4', 'portrait');
                session_destroy();
    } else {
        ?>
        <script>
            alert(" CPF Incorreto !");
        </script>'
        <?php
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Comprovante</title>
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
                            <legend><h3 class="text-center">Gera Comprovante</h3></legend>
                            <form method="POST" class="form-horizontal">

                                <div class="text-center">
                                    <p>1º CONFIRME SEU CPF NO CAMPO ABAIXO</p>
                                    <p>2º IMPRIMA O ARQUIVO GERADO</p>
                                    <p>3º EFETUE O PAGAMENTO NA INSTITUIÇÃO(RSÁ)</p></br>       
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="nome">CPF:</label>  
                                    <div class="col-md-6">
                                        <input type="text" name="cpf" value="<?php
                                        if (isset($_SESSION['cpf'])) {
                                            echo $_SESSION['cpf'];
                                        }
                                        ?>" pattern="\d{11}" placeholder="00000000000" class="form-control input-md" title="Digite o CPF no formato nnnnnnnnnnn" required="required" />
                                    </div>
                                </div>
                                </div>
                                <div align="center">
                                    </br><input type = "submit" name = "btnConcluir" value = "Gerar Comprovante" class="btn btn-primary" a/>

                                    </fieldset>
                                </div>
                                </div>
                                </div>
                                </div>

                            </form>
                            </body>
                            </html>
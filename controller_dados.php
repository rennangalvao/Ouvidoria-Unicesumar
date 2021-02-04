<?php 
  
require "classes/dados_model.php";
require "includes/conexao.php";
require "classes/dados_service.php";



  
 $dadosUsuario = new DadosUsuario();

//$dadosUsuario->__set('protocolo', $_POST['protocolo']);
$dadosUsuario->__set('nome', $_POST['nome']);
$dadosUsuario->__set('cpf', $_POST['cpf']);
$dadosUsuario->__set('rg', $_POST['rg']);
$dadosUsuario->__set('email', $_POST['email']);
$dadosUsuario->__set('cep', $_POST['cep']);
$dadosUsuario->__set('logradouro', $_POST['logradouro']);
$dadosUsuario->__set('numero', $_POST['numero']);
$dadosUsuario->__set('complemento', $_POST['complemento']);
$dadosUsuario->__set('bairro', $_POST['bairro']);
$dadosUsuario->__set('uf', $_POST['uf']);
$dadosUsuario->__set('pais', $_POST['pais']);
$dadosUsuario->__set('telefone_ddd', $_POST['telefone_ddd']);
$dadosUsuario->__set('telefone_numero', $_POST['telefone_numero']);
$dadosUsuario->__set('celular_ddd', $_POST['celular_ddd']);
$dadosUsuario->__set('celular_numero', $_POST['celular_numero']);
$dadosUsuario->__set('mensagem', $_POST['mensagem']);




$conexao = new Conexao();
$importaDados = new importaDados($conexao, $dadosUsuario);
$protocolo = $importaDados->Inserir();







//echo "<pre>";
//print_r($protocolo);
//echo "</pre>";

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ouvidoria UniCesumar</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      
    <script type="text/javascript" src="dist/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="dist/bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="container">
      <div class="text-center" style="margin-top: 20px">
        <img src="unicesumar.png" />

        <h2 style="margin-top:20px">Ouvidoria</h2>
        <p class="lead">Caso necessário entre em contato conosco.<br />Estamos à disposição para mais esclarecimentos sobre a utilização do serviço.</p>
      </div>

      <div class="row">
          
        <div class="col-md-12">
            <h4>Sua Manifestação enviada com sucesso</h4> 
            <div class="card">
              <div class="card-header">Detalhes da Manifestação</div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="text-right">Protocolo</th>
                            <td><?php echo $protocolo?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Nome</th>
                            <td><?php echo $_POST['nome']?></td>
                            <th class="text-right">Email</th>
                            <td><?php echo $_POST['email']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">CPF</th>
                            <td><?php echo $_POST['cpf']?></td>
                            <th class="text-right">RG</th>
                            <td><?php echo $_POST['rg']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Logradouro / Número</th>
                            <td>
                                <?php echo $_POST['logradouro']?>
                                 - 
                                <?php echo $_POST['numero']?>
                            </td>
                            <th class="text-right">CEP</th>
                            <td><?php echo $_POST['rg']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Complemento</th>
                            <td><?php echo $_POST['complemento']?></td>
                            <th class="text-right">Bairro</th>
                            <td><?php echo $_POST['bairro']?></td>
                        </tr>
                        <tr>
                            <th class="text-right">Cidade</th>
                            <td><?php echo $_POST['cidade']?></td>
                            <th class="text-right">Estado / País</th>
                            <td>
                                <?php echo $_POST['uf']?>
                                 - 
                                <?php echo $_POST['pais']?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-right">Telefone</th>
                            <td>
                                (<?php echo $_POST['telefone_ddd']?>)
                                 <?php echo $_POST['telefone_numero']?>
                            </td>
                            <th class="text-right">Celular</th>
                            <td>
                                (<?php echo $_POST['celular_ddd']?>)
                                 <?php echo $_POST['celular_numero']?>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-right">Mensagem</th>
                            <td colspan="3">
                                <?php echo $_POST['mensagem']?>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
          
      </div>


            <hr />
              
      <div class="col-md-12">
                        <a href="index.html"><input type="submit" class="btn btn-primary btn-lg btn-block" value="Sair" style="margin-bottom:50px"></a>
                      </div>
    </div><!-- container -->

  </body>
</html>





